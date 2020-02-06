<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = "idOrder";
    protected $fillable = ['idOrder', 'priority', 'address', 'user'];
    public $timestamps = false;
}
