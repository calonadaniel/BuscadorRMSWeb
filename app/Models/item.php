<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{

    protected $table = 'item';
    Protected $primaryKey = "ID";

    use HasFactory;

    Protected $fillable = [
    'BuydownPrice' 
    ,'BuydownQuantity'
    ,'CommissionAmount'
    ,'CommissionMaximum'
    ,'CommissionMode'
    ,'CommissionPercentProfit'
    ,'CommissionPercentSale'
    ,'Description'
    ,'FoodStampabe'
    ,'HQID'
    ,'ItemNotDiscountable'
    ,'LastReceived'
    ,'LastUpdated'
    ,'Notes'
    ,'QuantityCommitted'
    ,'SerialNumberCount'
    ,'TareWeightPercent'
    ,'ItemLookupCode'
    ,'CategoryID'
    ,'MessageID'
    ,'Price'
    ,'PriceA'
    ,'PriceB'
    ,'PriceC'
    ,'SalePrice'
    ,'SaleStartDate'
    ,'SaleEndDate'
    ,'QuantityDiscountID'
    ,'TaxID'
    ,'ItemType'
    ,'Cost'
    ,'Quantity'
    ,'ReorderPoint'
    ,'RestockLevel'
    ,'TareWeight'
    ,'SupplierID'
    ,'TagAlongItem'
    ,'TagAlongQuantity'
    ,'ParentItem'
    ,'ParentQuantity'
    ,'BarcodeFormat'
    ,'PriceLowerBound'
    ,'PriceUpperBound'
    ,'PictureName'
    ,'LastSold'
    ,'ExtendedDescription'
    ,'SubDescription1'
    ,'SubDescription2'
    ,'SubDescription3'
    ,'UnitOfMeasure'
    ,'SubCategoryID'
    ,'QuantityEntryNotAllowed'
    ,'PriceMustBeEntered'
    ,'BlockSalesReason'
    ,'BlockSalesAfterDate'
    ,'Weight'
    ,'Taxable'
    ,'DBTimeStamp'
    ,'BlockSalesBeforeDate'
    ,'LastCost'
    ,'ReplacementCost'
    ,'WebItem'
    ,'BlockSalesType'
    ,'BlockSalesScheduleID'
    ,'SaleType'
    ,'SaleScheduleID'
    ,'Consignment'
    ,'Inactive'
    ,'LastCounted'
    ,'DoNotOrder'
    ,'MSRP'
    ,'DateCreated'
    ,'Content'
    ,'UsuallyShip'
    ,'Fisico'
    ,'PuntoExtra'];

    //Relacion enetre la tabla item y itemDynamic
    public function itemDynamic()
    {
                                                    //Foreign key  //Local key
        return $this->hasOne('App\Models\itemDynamic', 'ItemID', 'ID');
    }

    public function department()
    {
                                                        //foreign key
        return $this->belongsTo('App\Models\department', 'DepartmentID',  );
    }

    public function DescuentosGlobales_Articulos()
    {
                                                                             //Foreign key  //Local key
        return $this->hasMany('App\Models\DescuentosGlobales_Articulos', 'Itemlookupcode', 'Itemlookupcode');
    }

    public function DescuentosGlobales_Articulos_3raEdad()
    {
                                                                                    //Foreign key  //Local key
        return $this->hasMany('App\Models\DescuentosGlobales_Articulos_3raEdad', 'Itemlookupcode', 'Itemlookupcode');
    }

    public function DescuentosGlobales_Articulos_Promocional()
    {
                                                                                         //Foreign key  //Local key
        return $this->hasMany('App\Models\DescuentosGlobales_Articulos_Promocional', 'Itemlookupcode', 'Itemlookupcode');
    }



}
