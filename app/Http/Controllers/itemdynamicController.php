<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Models\item;
use App\Models\item;

class itemdynamicController extends Controller
{

    public function index ($itemlookupcode) {

        $itemlookupcode = '7401094605431';

        $itemlist = item::select('item.ID as id','item.itemlookupcode', 'item.description','department.Name as department','item.price', 'itemdynamic.quantity as inventory','item.quantity as hqQuantity', 'dpg.Discount as dpg', 'd3e.Discount as d3e','dpr.Discount as dpr')
        ->leftJoin('department', 'item.departmentid', '=', 'department.ID')
        ->leftJoin('itemdynamic', 'itemdynamic.ItemID', '=', 'item.ID')
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
          ->get();

          dd($itemlist);
    }

}
