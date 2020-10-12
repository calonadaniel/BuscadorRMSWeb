<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;

    protected $table = 'Store';
    Protected $primaryKey = "ID";

    public function itemdynamic() {
                                                    //Foreign key  //Local key
        return $this->hasMany('App\Models\itemDynamic', 'StoreID', 'ID');
    }

    public function DescuentosGlobales_Articulos() {
                                                    //Foreign key  //Local key
        return $this->hasMany('App\Models\descuentosGlobales_Articulos', 'StoreID', 'ID');
    }

    public function DescuentosGlobales_Articulos_Promocional() {
                                                                                //Foreign key  //Local key
        return $this->hasMany('App\Models\DescuentosGlobales_Articulos_Promocional', 'StoreID', 'ID');
    }

    public function DescuentosGlobales_Articulos_3raEdad() {
                                                                                //Foreign key  //Local key
        return $this->hasMany('App\Models\DescuentosGlobales_Articulos_3raEdad', 'StoreID', 'ID');
    }
}
