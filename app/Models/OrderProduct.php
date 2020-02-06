<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'orderProducts';
    protected $fillable = ['idProduct', 'name', 'quantity', 'idOrder'];
    public $timestamps = false;
}
