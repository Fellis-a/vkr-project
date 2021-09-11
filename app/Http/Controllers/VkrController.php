<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vkrs;
use App\Models\specialty;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
class VkrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      //$vkrs = DB::table('vkrs')->simplePaginate(8);
      //->paginate(15)
      $vkrs = vkrs::with('specialty')->paginate(15);
      $user = vkrs::with('user')->paginate(15);

      $data['specialty']=specialty::orderBy('id','desc')->get();

     //return view('welcome', compact('vkrs','user'));

     //$data['vkrs']=vkrs::orderBy('id','desc')->get();

      $post_query=vkrs::with('specialty')->paginate(15);

      if($request->specialty){
        $vkrs->whereHas('specialty',function($q) use ($request){
         $q->where('specialty',$request->specialty);
        });
      }

      if($request->keyword){
       $post_query->where('title','LIKE','%'.$request->keyword.'%');
      }

      $data['vkrs']=$post_query;
      return view('welcome',$data);

     /*$vkrs = vkrs::where(
         [
             ['title', '!=', Null],
             [function ($query) use ($request){
                 if (($term=$request->term)) [
                     $query->orWhere
                 ]
             }

         ]
         ]
         )
        if (request('term')) {
            $vkrs->where('title', 'Like', '%' . request('term') . '%');
        }

        return $vkrs->orderBy('id', 'DESC')->paginate(10);*/
    }

    /*function action(Request $request)
    {
        $data = $request->all();

        $query = $data['query'];

        $filter_data = vkrs::select('title')
                        ->where('title', 'LIKE', '%'.$query.'%')
                        ->get();

        return response()->json($filter_data);
    }

    public function find(Request $request){
            $request->validate([
              'query'=>'required|min:2'
           ]);

           $search_text = $request->input('query');
           $vkrs = DB::table('vkrs')
                      ->where('title','LIKE','%'.$search_text.'%')
                    //   ->orWhere('SurfaceArea','<', 10)
                    //   ->orWhere('LocalName','like','%'.$search_text.'%')
                      ->paginate(15);
            return view('search',['vkrs'=>$vkrs]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $vkrs = vkrs::with('specialty')->paginate(15);
        $user = vkrs::with('user')->paginate(15);
        $specialty = specialty::with('vkrs')->get();
            return view('search', compact('vkrs', 'user', 'specialty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'title' => 'required',
          'year' => 'required',
          'mark' => 'required'
      ]);

      vkrs::create($request->all());

      return redirect()->route('vkrs.index')
          ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vkrs = vkrs::with('specialty', 'User')->get()->find($id);
        return view ('user.show', compact('vkrs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vkrs = vkrs::with('specialty', 'User')->get()->find($id);
        return view ('user.vkr.edit', compact('vkrs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function sort()
    {
        $vkrs = vkrs::all();
        $years = $vkrs->sortBy('year')->pluck('year')->unique();
        //$year = $vkrs->sortBy('year')->pluck('year')->unique();
        return view('welcome', compact('years'));
    }

}
