<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\vkrs;
use App\Models\specialty;
use App\Models\User;
use Livewire\WithPagination;

class WelcomeVkrs extends Component
{
    use WithPagination;
    public $paginate = 10;
    public $search = "";
    public $selectPage = false;
    public $selectAll = false;
    public $selectedSpecialty = null;
    public $sortField = 'specialty'; // default sorting field
    public $sortAsc = true; // default sort direction

	public $searchTerm;
    public $currentPage = 1;

    public function render()
    {
    	$query = '%'.$this->searchTerm.'%';

    	return view('livewire.welcome-vkrs', [
            'specialty' => specialty::all(),
    		'vkrs'		=>	vkrs::where(function($sub_query){
    							$sub_query->where('title', 'like', '%'.$this->searchTerm.'%')
    									  ->orWhere('tech', 'like', '%'.$this->searchTerm.'%');
    						})->paginate(10)

    	]);
    }


    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
    }


}
