<?php


namespace App\ServiceContracts;


use Illuminate\Http\Request;

interface AutenticacionContract
{
    public function log(Request $request):string;
}
