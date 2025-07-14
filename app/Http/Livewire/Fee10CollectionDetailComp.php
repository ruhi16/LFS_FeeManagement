<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Fee10CollectionDetailComp extends Component{
    public $selectedMyclassId = 1;
    public $selectedFeeStructureId = 1;



    
    public function mount(){
        
    }
    
    public function selectMyclass($myclassId){
        
        $this->selectedMyclassId = $myclassId;
        
        // Optionally, you can emit an event or perform other actions when a class is selected
    }

    // public function updatedMyclass($myclassId){
    //     $this->selectedMyclassId = $myclassId;
    //     // Optionally, you can emit an event or perform other actions when a class is updated
    // }





















    public function render(){
        return view('livewire.fee10-collection-detail-comp',[
            'myclasses' => \App\Models\MyClass::currentlyActive(),
        ]);
    }
}
