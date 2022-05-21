<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddVkrRequest;
use Illuminate\Support\Facades\Facade;
use App\Models\vkrs;
use App\Models\specialty;
use App\Models\User;
use App\Models\vacant_vkrs;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('perm:create-vkr')->only(['create', 'store']);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $auth = auth()->user();
        //$user = User::where('id','=',$auth->id);
        //$vkrsa = DB::table('vkrs');
        $vkrs = $auth->vkrs;
        $specialty = specialty::with('vkrs')->get();
        //$specialty = $vkrs->specialty;
        //$code = $specialty ->code;
        //$vkrsSpec = specialty::with('vkrs')->get()->find($specialty);
        //$spec_id = $vkrs->specialty->specialty_id;
        //$specInfo = specialty::with('vkrs')->get()->find($specialty_id);


        return view('home', compact('vkrs','specialty'));
    }

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

    /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */

    public function create(){

    $specialty = specialty::all();
    //$vkrs = vkrs::with('specialty')->get();
    //$vkrs = DB::table('vkrs');
    //$code = $specialty->code;
    return view('user.vkr.create', compact('specialty'));
    }





    /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          $vkrFound = vkrs::find($id);
           if( $vkrFound==null){
            return redirect('home')->with('error', 'Запись не удалена!');
            }
           else
             {
            $vkrFound->delete();
            return redirect('home')->with('success', 'Запись успешно удалена!');
            }


      }


      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function showOneVkr($id){
          /*$vkrs = new vkrs;
          //$vkr = vkrs::with('specialty', 'User')->get()->find($id);
          return view ('user.vkr.showVkrAuthPerson', ['vkrs' => $vkrs-> find($id)]);*/
          //$auth = auth()->user();
          //$vkr = $auth->vkrs->;
          $vkr = vkrs::with('specialty', 'User')->get()->find($id);
          return view ('user.vkr.show', compact('vkr'));

      }




      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
          $vkr = vkrs::with('specialty', 'User')->get()->find($id);
          $specialty = specialty::all();
          return view ('user.vkr.edit', compact('vkr', 'id', 'specialty'));
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(AddVkrRequest $request, $id)
      {
          $user = auth()->user();
          $newVkr = vkrs::find($id);
          $newVkr->title = $request -> input('title');
          $newVkr->year = $request -> input('year');
          $newVkr->mark = $request -> input('mark');
          $newVkr->essay = $request -> input('essay');
          $newVkr->tech = $request -> input('tech');
          $newVkr->specialty_id = $request -> input('specialty_id');
          $newVkr->user_id = $user ->id;;

          $newVkr->save();
          $vkr=$newVkr;
          return view('user.vkr.show', compact('vkr'))->with('success', 'ВКР успешно отредактирована!');//переадресация на главную страницу


      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function addVacantVkr(Request $request)
      {
          $user = auth()->user();
          $newVacantVkr = new vacant_vkrs();
          $newVacantVkr->title = $request -> input('title');
          $newVacantVkr->description = $request -> input('description');
          $newVacantVkr->user_id = $user ->id;;

          $newVacantVkr->save();
         
          return redirect('/home')->with('success', 'Информация о ВКР добавлена!');//переадресация на главную страницу


      }

      public function createVacantVkr(){


        return view('user.vkr.createVacantVkr');
    }
}
