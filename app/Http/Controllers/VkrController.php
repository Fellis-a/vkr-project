<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsersVacantVkrs;
use App\Http\Resources\VkrResource;
use App\Http\Resources\VkrVacantResource;
use App\Http\Resources\Years;
use App\Http\Resources\Marks;
use Illuminate\Http\Request;
use App\Models\vkrs;
use App\Models\specialty;
use App\Models\User;
use App\Models\vacant_vkrs;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class VkrController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $paginate = request('paginate', 10);
    $search_term = request('q', '');
    $selectedSpecialty = request('selectedSpecialty');
    $selectedUser = request('selectedUser');
    $selectedYear = request('selectedYear');
    $selectedMark = request('selectedMark');
    $sort_direction = request('sort_direction', 'desc');

    if (!in_array($sort_direction, ['asc', 'desc'])) {
      $sort_direction = 'desc';
    }
    $sort_field = request('sort_field','year');
    if (!in_array($sort_field, ['title', 'year', 'mark'])) {
      $sort_field = 'year';
    }


    $vkrs = vkrs::with(['specialty', 'User'])
      ->when($selectedSpecialty, function ($query) use ($selectedSpecialty) {
        $query->where('specialty_id', $selectedSpecialty);
      })
      ->when($selectedUser, function ($query) use ($selectedUser) {
        $query->where('user_id', $selectedUser);
      })
      ->when($selectedYear, function ($query) use ($selectedYear) {
        $query->where('year', $selectedYear);
      })
      ->when($selectedMark, function ($query) use ($selectedMark) {
        $query->where('mark', $selectedMark);
      })
   
      ->search(trim($search_term))
      ->orderBy($sort_field, $sort_direction)
      ->paginate($paginate);

    return VkrResource::collection($vkrs);
  }

  public function filterYear()
  {
    $years = vkrs::select('year')->distinct()->orderBy('year')->get();
    return Years::collection($years);
  }
  public function filterMark()
  {
    $marks = vkrs::select('mark')->distinct()->orderBy('mark')->get();
    return Marks::collection($marks);
  }
  

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function vacant()
  {

    $selectedVacantUser = request('selectedVacantUser');


    $vkrs = vacant_vkrs::all();
  

    return VkrVacantResource::collection($vkrs);
  }
  public function vacantUsers()
  {

    $search_term = request('q', '');
    $selectedVacantUser = request('selectedVacantUser');


    $users = User::all();


    return UsersVacantVkrs::collection($users);
  }



}
