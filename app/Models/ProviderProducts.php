<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProviderProducts extends Model
{
    protected $table="providersProducts";
    protected $fillable = ['idProvider', 'idProduct'];
    public $timestamps = false;
}
