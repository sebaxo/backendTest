<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $primaryKey = "idProvider";
    protected $table = "providers";
    protected $fillable = ['idProvider', 'name'];
    public $timestamps = false;
}
