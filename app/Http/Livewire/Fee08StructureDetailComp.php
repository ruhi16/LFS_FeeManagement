<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Fee08StructureDetailComp extends Component
{
    public $showAddDetailModal = false, $showDeleteConfirmationModal;

    public $myclass_id, $fee_structure_id, $fee_category_id, $fee_particular_id, $amount, $fee_collection_type, $fee_mandate_id;
    public $feeStructureDetailId = null, $feeStructureDetailToDelete = null;

    public function openFeeStructureDetailModal($myclassId = null, $feeStructureId = null, $feeStructureDetailId = null){
        $this->myclass_id = $myclassId;
        $this->fee_structure_id = $feeStructureId;
        $this->feeStructureDetailId = $feeStructureDetailId;

        $feeStructure = \App\Models\Fee06Structure::find($feeStructureId);
        $myclass = \App\Models\MyClass::find($myclassId);

        $this->fee_mandate_id = $feeStructure->fee_mandate_id ?? null;
        if($feeStructureDetailId){
            $feeStructureDetail = \App\Models\Fee07StructureDetail::find($feeStructureDetailId);
            if ($feeStructureDetail) {
                $this->fee_category_id = $feeStructureDetail->fee_category_id;
                $this->fee_particular_id = $feeStructureDetail->fee_particular_id;
                $this->amount = $feeStructureDetail->amount;
                $this->fee_collection_type = $feeStructureDetail->is_special ? '1' : '0'; // Assuming 1 for special, 0 for regular
            } else {
                session()->flash('error', 'Fee structure detail not found.');
                return;
            }
        } else {
            // Reset fields if no detail ID is provided
            $this->reset(['fee_category_id', 'fee_particular_id', 'amount', 'fee_collection_type']);
        }

        // $this->resetErrorBag();
        // $this->reset(['myclass_id', 'fee_structure_id', 'fee_category_id', 'fee_particular_id', 'amount', 'fee_collection_type', 'fee_mandate_id']);
        
        // Open the modal
        $this->showAddDetailModal = true;
    }

    // protected $listeners = [
    //     'openAddDetailModal' => 'openAddDetailModal',
    //     'closeModal' => 'closeModal',
    //     'addFeeStructureDetail' => 'addFeeStructureDetail',
    // ];

    public function saveAddFeeStructureDetail($feeStructureDetailId = null){
        // dd($this->myclass_id, $this->fee_structure_id, $this->fee_category_id, $this->fee_particular_id, $this->amount, $this->fee_collection_type, $this->fee_mandate_id);
        // dd($feeStructureDetailId);

        $this->validate([
            'myclass_id' => 'required|exists:myclasses,id',
            'fee_mandate_id' => 'nullable|exists:fee03_mandates,id',

            // 'fee_structure_id' => 'required|exists:fee06_structures,id',
            'fee_category_id' => 'required|exists:fee01_categories,id',
            'fee_particular_id' => 'required|exists:fee02_particulars,id',
            'amount' => 'required|numeric|min:0',
            'fee_collection_type' => 'required|in:0,1', // Assuming 0 for regular, 1 for special
            // 'fee_mandate_id' => 'nullable|exists:fee03_mandates,id',
        ]);

        // dd($this->myclass_id, $this->fee_structure_id, $this->fee_category_id, $this->fee_particular_id, $this->amount, $this->fee_collection_type, $this->fee_mandate_id);

        try {
            \App\Models\Fee07StructureDetail::updateOrCreate([
                // Use the ID if provided, otherwise create a new record
                'id' => $feeStructureDetailId, 
            ], [
                // 'myclass_id' => $this->myclass_id,
                'fee_structure_id' => $this->fee_structure_id,
                'fee_category_id' => $this->fee_category_id,
                'fee_particular_id' => $this->fee_particular_id,
                'amount' => $this->amount,
                'is_special' => $this->fee_collection_type === '1', // Assuming 1 for special, 0 for regular

                // 'fee_collection_type' => $this->fee_collection_type,
                // 'fee_mandate_id' => $this->fee_mandate_id,
            ]);

            // If fee_mandate_id is provided, update the fee structure
            // if ($this->fee_mandate_id) {
            //     $feeStructure = \App\Models\Fee06Structure::find($this->fee_structure_id);
            //     $feeStructure->fee_mandate_id = $this->fee_mandate_id;
            //     $feeStructure->save();
            // }

            session()->flash('message', 'Fee structure detail added successfully.');
            $this->closeModal();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to add fee structure detail: ' . $e->getMessage());
        }
    }


    public function openDeleteConfirmationModal($feeStructureDetailId){
        $this->feeStructureDetailId = $feeStructureDetailId;
        $this->showDeleteConfirmationModal = true;
        try{
            $this->feeStructureDetailToDelete = \App\Models\Fee07StructureDetail::find($feeStructureDetailId);
            
            session()->flash('message', 'Are you sure you want to delete this fee structure detail?');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to open delete confirmation modal: ' . $e->getMessage());
        }
        
    }

    
    public function closeModal(){

        $this->showAddDetailModal = false;
        $this->reset(['myclass_id', 'fee_structure_id', 'fee_category_id', 'fee_particular_id', 'amount', 'fee_collection_type', 'fee_mandate_id']);

        $this->showDeleteConfirmationModal = false; // Close the delete confirmation modal
        $this->resetErrorBag(); // Reset error messages
        $this->resetValidation(); // Reset validation state
        $this->feeStructureDetailId = null; // Reset the detail ID
        $this->feeStructureDetailToDelete = null; // Reset the detail to delete
    }



    public function deleteFeeStructureDetail($feeStructureDetailId ){
        if (!$feeStructureDetailId) {
            session()->flash('error', 'Fee structure detail ID is required for deletion.');
            return;
        }

        try {
            $detail = \App\Models\Fee07StructureDetail::find($feeStructureDetailId);
            if (!$detail) {
                session()->flash('error', 'Fee structure detail not found.');
                return;
            }else{
                // Check if the detail belongs to the specified class and structure
                $detail->delete();
                session()->flash('message', 'Fee structure detail deleted successfully.');
            } 

        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete fee structure detail: ' . $e->getMessage());
        }

        $this->closeModal();
    }


    public function render()
    {
        return view('livewire.fee08-structure-detail-comp',[
            'myclasses' => \App\Models\MyClass::all(),
            'feeStructures' => \App\Models\Fee06Structure::with('structureDetails', 'feeMandate')->get(),
            'feeMandates' => \App\Models\Fee03Mandate::all(),
            'feeCategories' => \App\Models\Fee01Category::all(),
            'feeParticulars' => \App\Models\Fee02Particular::all(),
            
        ]);
    }


}
