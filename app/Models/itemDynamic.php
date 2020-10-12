<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemDynamic extends Model
{
    use HasFactory;

    protected $table = 'itemDynamic';
    Protected $primaryKey = "ItemID";

    protected $fillable = [ 
     'ID'
    ,'StoreID'
    ,'TaxID'
    ,'Quantity'
    ,'QuantityCommitted'
    ,'ReorderPoint'
    ,'RestockLevel'
    ,'LastReceived'
    ,'LastSold'
    ,'SnapShotQuantity'
    ,'SnapShotQuantityCommitted'
    ,'DeltaQuantity'
    ,'DeltaQuantityCommitted'
    ,'SnapShotTime'
    ,'DBTimeStamp'
    ,'SnapShotPrice'
    ,'SnapShotPriceA'
    ,'SnapShotPriceB'
    ,'SnapShotPriceC'
    ,'SnapShotSalePrice'
    ,'SnapShotSaleStartDate'
    ,'SnapShotSaleEndDate'
    ,'SnapShotCost'
    ,'SnapShotLastCost'
    ,'SnapShotReplacementCost'
    ,'SnapShotPriceLowerBound'
    ,'SnapShotPriceUpperBound'
    ,'SnapShotReorderPoint'
    ,'SnapShotRestockLevel'
    ,'SnapShotTaxID'];




    public function item()
    {
        return $this->belongsTo('App\Models\item', 'ID');
    }

    public function store ()
    {
        return $this->belongsTo('App\Models\store', 'StoreID');
    }

}
