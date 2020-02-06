<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $primaryKey = "idProduct";
    protected $table = 'inventory';
    protected $fillable = ['idProduct', 'date', 'quantity'];
    public $timestamps = false;
}
