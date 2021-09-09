<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use App\Http\Requests\AddVkrRequest;
use App\Models\vkrs;
use App\Models\specialty;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AddVkrController extends Controller
{
          public function store(Request $req){
                    $user = auth()->user();
                    $newVkr = new vkrs();
                    $newVkr->title = $req -> input('title');
                    $newVkr->year = $req -> input('year');
                    $newVkr->mark = $req -> input('mark');
                    $newVkr->essay = $req -> input('essay');
                    $newVkr->tech = $req -> input('tech');
                    $newVkr->specialty_id = $req -> input('specialty_id');
                    $newVkr->user_id = $user ->id;;

                    $newVkr->save();
                    return redirect('/home')->with('success', 'ВКР успешно добавлена!');//переадресация на главную страницу


          }

          public function create(){

                    $specialty = specialty::all();
                    $vkrs = vkrs::with('specialty')->get();
                    //$code = $specialty->code;
                    return view('user.vkrForm', compact('vkrs', 'specialty'));
          }
}
