<?php

namespace App\Http\Controllers;

use App\Http\Resources\SpecialtyResource;
use Illuminate\Http\Request;
use App\Models\specialty;

class SpecialtyController extends Controller
{
   public function index(){
    $specialties = specialty::all();

    return SpecialtyResource::collection($specialties);
   }


}
