<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $table = 'department';


    Protected $primaryKey = "ID";


    //Relacion enetre la tabla department y item
    public function item()
    {
                                               //Foreign key  //Local key
        return $this->hasmany('App\Models\item', 'DepartmentID', 'ID');
    }

}
