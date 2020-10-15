<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Models\item;
use App\Models\store;



class itemController extends Controller
{
    private $query;
    
    public function index(Request $request){

        $store = "32";  //Por defecto FC Aeropuerto
        $selectedstore = $store;

        $query = "";    // Busqueda vacia en primera carga

        $item = $this->itemlist($store,$query);
        $store = $this->storelist();

        //$selectedstore = $store->where('ID',$selectedstore);
        //dd($selectedstore);

        return view('index', compact('item', 'store', 'query', 'selectedstore'));
    } 

     public function search(Request $request) {

       $store = $request->get('store_selected');
       $selectedstore = $store;

       //dd($selectedstore);

       $query = $request->get('search');

       $item = $this->itemlist($store, $query);
       $store = $this->storelist();

       //$selectedstore = $store->where('ID',$selectedstore);

       //dd($selectedstore);

       return view('index', compact('item', 'store', 'query','selectedstore'));
     }


     public function itemlist ($store, $query) {
       
       if($query != '' || $query = null) {
        $itemlist = item::select('item.ID as id','item.itemlookupcode', 'item.description','department.Name as department','item.price', 'itemdynamic.quantity as inventory','item.quantity as hqQuantity', 'dpg.Discount as dpg', 'd3e.Discount as d3e','dpr.Discount as dpr')
        ->leftJoin('department', 'item.departmentid', '=', 'department.ID')
        ->leftJoin('itemdynamic', 'item.ID', '=', 'itemdynamic.ItemID')
        ->leftJoin('Alias', 'item.ID', '=', 'alias.ItemID')
        ->leftJoin ('L@Red_Software_DescuentosGlobales_Articulos as dpg', function($join) use ($store){
          $join->on('item.itemlookupcode','=','dpg.ItemLookupCode') 
              ->where("dpg.StoreID",'=',$store);  
          })
        ->leftJoin ('L@Red_Software_DescuentosGlobales_Articulos_3raEdad as d3e', function($join) use ($store){
          $join->on('item.itemlookupcode','=','d3e.ItemLookupCode') 
              ->where("d3e.StoreID",'=',$store);  
          })
          ->leftJoin ('L@Red_Software_DescuentosGlobales_Articulos_Promocional as dpr', function($join) use ($store){
            $join->on('item.itemlookupcode','=','dpr.ItemLookupCode') 
                ->where("dpr.StoreID",'=',$store);  
          })
  
        ->where('itemdynamic.StoreID', '=',$store) 
        ->where('item.inactive','=','0')
        ->Where(function ($search) use ($query) {
        $search->where('item.Itemlookupcode', 'like', '%'.$query.'%')
        ->orWhere('department.name', 'like', '%'.$query.'%')
        ->orWhere('item.Description', 'like', '%'.$query.'%')
        ->orWhere('item.extendeddescription', 'like', '%'.$query.'%')
        ->orWhere('item.subdescription1', 'like', '%'.$query.'%')
        ->orWhere('item.subdescription2', 'like', '%'.$query.'%')
        ->orWhere('item.subdescription3', 'like', '%'.$query.'%')
        ->orWhere('alias.alias', 'like', '%'.$query.'%');
        })
          ->orderBy('item.Description')    
          ->distinct()
          ->get();

          return $itemlist;   

        } else {
          
          $itemlist = item::select('item.ID as id','item.itemlookupcode', 'item.description','department.Name as department','item.price', 'itemdynamic.quantity as inventory','item.quantity as hqQuantity', 'dpg.Discount as dpg', 'd3e.Discount as d3e','dpr.Discount as dpr')
          ->leftJoin('department', 'item.departmentid', '=', 'department.ID')
          ->leftJoin('itemdynamic', 'item.ID', '=', 'itemdynamic.ItemID')
          ->leftJoin('Alias', 'item.ID', '=', 'alias.ItemID')
          ->leftJoin ('L@Red_Software_DescuentosGlobales_Articulos as dpg', function($join) use ($store){
            $join->on('item.itemlookupcode','=','dpg.ItemLookupCode') 
                ->where("dpg.StoreID",'=',$store);  
            })
          ->leftJoin ('L@Red_Software_DescuentosGlobales_Articulos_3raEdad as d3e', function($join) use ($store){
            $join->on('item.itemlookupcode','=','d3e.ItemLookupCode') 
                ->where("d3e.StoreID",'=',$store);  
            })
            ->leftJoin ('L@Red_Software_DescuentosGlobales_Articulos_Promocional as dpr', function($join) use ($store){
              $join->on('item.itemlookupcode','=','dpr.ItemLookupCode') 
                  ->where("dpr.StoreID",'=',$store);  
            })
          ->where('item.inactive','=','0')
          ->where('itemdynamic.StoreID', '=',$store) 
          ->orderBy('Description')
          ->distinct()

          ->paginate(100);

          return $itemlist;
        }
  
    }

    public function storelist() {
      $storelist = store::select('*')
      ->where('Name', 'not like', '%ZZ%' )
      ->where('Name', 'not like', '%ProNAF%' )
      ->where('Name', 'not like', '%Administracion%')
      ->where('Name', 'not like', '%Bodega%')
      ->where('Name', 'not like', '%Distribucion%')
      ->where('Name', 'not like', '%DevolucionesPro%')
      ->orderby('Name','asc')
      ->get();

       return $storelist;
     }


     public function itemdetail($itemlookupcode) {

      //$itemlookupcode = '7401094605431';

      $itemlist = item::select('store.name as storename','item.ID as id','item.itemlookupcode', 'item.description','item.extendeddescription','item.subdescription1','item.subdescription2','item.subdescription3','department.Name as department','item.price', 'itemdynamic.quantity as inventory','item.quantity as hqQuantity', 'dpg.Discount as dpg', 'd3e.Discount as d3e','dpr.Discount as dpr')
      ->leftJoin('department', 'item.departmentid', '=', 'department.ID')
      ->leftJoin('itemdynamic', 'itemdynamic.ItemID', '=', 'item.ID')
      ->leftjoin ('store', 'itemdynamic.storeid','=','store.id')
      ->leftJoin ('L@Red_Software_DescuentosGlobales_Articulos as dpg', function($join){
        $join->on('item.itemlookupcode','=','dpg.ItemLookupCode') 
            ->on("dpg.storeID",'=','itemdynamic.storeID');  
          })
      ->leftJoin ('L@Red_Software_DescuentosGlobales_Articulos_3raEdad as d3e', function($join){
        $join->on('item.itemlookupcode','=','d3e.ItemLookupCode') 
            ->on("d3e.storeID",'=','itemdynamic.storeID');   
          })
      ->leftJoin ('L@Red_Software_DescuentosGlobales_Articulos_Promocional as dpr', function($join) {
          $join->on('item.itemlookupcode','=','dpr.ItemLookupCode') 
            ->on("dpr.storeID",'=','itemdynamic.storeID');  
          })
      ->where('item.itemlookupcode','=',$itemlookupcode )
      
      ->where('store.name', 'not like', '%ZZ%' )
      ->where('store.name', 'not like', '%ProNAF%' )
      ->where('store.name', 'not like', '%Administracion%')
      ->where('store.name', 'not like', '%Bodega%')
      ->where('store.name', 'not like', '%Distribucion%')
      ->where('store.name', 'not like', '%DevolucionesPro%')
      ->orderby('store.name','asc')
      //->distinct()
      ->get();
      //dd($itemlist);
      $item = $itemlist;

      return view('itemdetail', compact('item'));
     }
}
