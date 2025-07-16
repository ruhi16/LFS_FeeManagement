<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Fee10CollectionDetailComp extends Component{
    
    
    public $showFeeCollectionIndividual = false;

    public $selectedMyclassId = 1;
    public $feeStructures = null, $selectedFeeStructureId = null;

    public $myclasses;


    public $studentcr = null, $mandateDate = null, $feeStructure; // This variable is not used in the provided code, but declared here for potential future use


    public function refresh(){
        $this->myclasses = \App\Models\MyClass::currentlyActive();                

        $this->feeStructures = \App\Models\Fee06Structure::currentlyActive()
            ->where('myclass_id', $this->selectedMyclassId)
            ->get();

        
    }
    
    public function mount(){
        $this->refresh();   
    }
    
    public function selectMyclass($myclassId){        
        $this->selectedMyclassId = $myclassId;
        $this->selectedFeeStructureId = null; // Reset selected fee structure when class changes

        $this->refresh();
    }

    public function selectFeeStructure($feeStructureId){
        
        $this->selectedFeeStructureId = $feeStructureId;
        // Optionally, you can emit an event or perform other actions when a fee structure is selected
        
        $this->refresh();
    }

    // public function updatedMyclass($myclassId){
    //     $this->selectedMyclassId = $myclassId;
    //     // Optionally, you can emit an event or perform other actions when a class is updated
    // }

    public function collectFeeStudentcr($studentcrId, $mandateDateId){
        $this->studentcr = \App\Models\Studentcr::find($studentcrId);
        $this->mandateDate = \App\Models\Fee04MandateDate::find($mandateDateId);
        $this->feeStructure = $this->feeStructures->find($this->selectedFeeStructureId);

        // dd($this->studentcr, $this->feeStructure, $this->mandateDate->mandate);
        // Example:

        if ($this->studentcr && $this->mandateDate && $this->feeStructure) {
            $this->showFeeCollectionIndividual = true;
            // session()->flash('error', 'Invalid StudentCR, Mandate Date, or Fee Structure selected.');
            // return;
        }

        try{
            \App\Models\Fee08Collection::create([
                // 'myclass_id' => $this->studentcr->myclass_id,
                // 'section_id' => $this->studentcr->section_id,
                // // 'roll_no' => $this->studentcr->roll_no,
                // 'studentcr_id' => $studentcrId,
                // 'fee_mandate_id' => $this->mandateDate->mandate->id,
                // 'fee_mandate_date_id' => $this->mandateDate->id,
                
                // 'total_amount' => $this->feeStructure->structureDetails->sum('amount'),
                // 'paid_date' => now(),
            ]);



            session()->flash('success', 'Fee collected successfully for StudentCR ID: ' . $studentcrId);
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to collect fee: ' . $e->getMessage());
            return;
        }

        // \App\Models\Fee08Collection::create([
        //     'studentcr_id' => $studentcrId,
        //     'mandate_date_id' => $mandateDateId,
        //     'amount' => $this->feeStructures->find($this->selectedFeeStructureId)->amount,
        // ]);

        session()->flash('message', 'Fee collected successfully for StudentCR ID: ' . $studentcrId);
    }


    
















    public function render(){
        return view('livewire.fee10-collection-detail-comp');
    }
}
