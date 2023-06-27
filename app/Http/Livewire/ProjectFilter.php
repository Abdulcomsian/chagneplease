<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Plan;
use Livewire\WithPagination;

class ProjectFilter extends Component
{
    use WithPagination;

    public $countriesList;
    public $citiesList;
    public $country = null;
    public $city = null;
    public $search;
    public $minimumRange;
    public $maximumRange;
    public $atMax;
    public $atMin;
    public $category = [];
    protected $planList = null;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $plans = !isset($this->planList) ? Plan::orderBy('id' , 'desc')->where('status' , 'accepted')->paginate(2) : $this->planList->paginate(2); 
        
        return view('livewire.project-filter' , ['plans' => $plans]);
    }

    public function mount()
    {
        $this->minimumRange = Plan::min('investment');
        $this->maximumRange = Plan::max('investment');
        $this->atMin = $this->minimumRange;
        $this->atMax = $this->maximumRange;
        $this->countriesList = Plan::distinct('country')->pluck('country')->toArray();
        $this->citiesList = Plan::distinct('city')->pluck('city')->toArray();
    }

    public function resetFilter()
    {
        $this->country = '';
        $this->city = '';
        $this->category = [];
    }

    public function updateProject()
    {
        $this->planList = Plan::when(isset($this->country) && !empty($this->country) , function($query){
                            
                            $query->where('country' , $this->country);
                           
                          })->when(isset($this->city) && !empty($this->city) , function($query){
                            
                            $query->where('city' , $this->city);   
                          
                          })->when(sizeof($this->category) > 0 , function($query){
                            
                            $query->whereIn('category', $this->category);
                          
                          })->when(isset($this->minimumRange) , function($query){

                            $query->where('investment','>=' , $this->minimumRange);

                          })->when(isset($this->maximumRange) , function($query){

                            $query->where('investment','<=' , $this->maximumRange);

                          })
                          ->where('status' , 'accepted')
                          ->orderBy('id' , 'desc');

    }

    public function searchProject()
    {
        $this->resetFilter();

        $this->planList = Plan::when(isset($this->search) && !empty($this->search) , function($query){

                            $query->where('company_name' , 'like' , '%'.$this->search.'%')->orWhere('size' , 'like' , '%'.$this->search.'%');

                         })
                         ->where('status' , 'accepted')
                         ->orderBy('id' , 'desc');
        
    } 
}
