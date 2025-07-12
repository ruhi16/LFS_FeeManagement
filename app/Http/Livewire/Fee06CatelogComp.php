<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Fee06CatelogComp extends Component{


    public $feeCatalogs;


    public function mount(){
        $this->feeCatalogs = \App\Models\Fee05Catelog::with(['myclass', 'feeCategory', 'feeParticular'])
            ->currentlyActive()
            ->whereHas('myclass', function($query) {
                $query->where('is_active', true);
            })            
            ->orderBy('created_at', 'desc')
            ->get();
    }



    public function render()
    {
        return view('livewire.fee06-catelog-comp');
    }
}
