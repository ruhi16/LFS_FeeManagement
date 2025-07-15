<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Fee10CollectionDetailIndividualComp extends Component{

    public $studentcr = null, $mandateDate = null, $feeStructure = null;

    public function mount($studentcrId = null, $mandateDateId = null, $feeStructureId = null){
        // Initialize properties if needed
        if ($studentcrId) {
            $this->studentcr = \App\Models\Studentcr::find($studentcrId);
        }
        if ($mandateDateId) {
            $this->mandateDate = \App\Models\Fee04MandateDate::find($mandateDateId);
        }
        if ($feeStructureId) {
            $this->feeStructure = \App\Models\Fee06Structure::find($feeStructureId);
        }


        

    }


    public function render()
    {
        return view('livewire.fee10-collection-detail-individual-comp');
    }
}
