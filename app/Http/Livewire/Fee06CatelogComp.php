<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Fee06CatelogComp extends Component{


    public $feeCatalogs;
    public $showModal = false;

    public $myclass_id;
    public $fee_category_id;
    public $fee_particular_id;
    public $amount;
    public $fee_collection_type;
    


    public function mount(){
        $this->feeCatalogs = \App\Models\Fee05Catelog::with(['myclass', 'feeCategory', 'feeParticular'])
            ->currentlyActive()
            ->whereHas('myclass', function($query) {
                $query->where('is_active', true);
            })            
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public function openModal($feeCatelogId = null)
    {
        // If feeCatelogId is provided, load the existing data into the form
        if ($feeCatelogId) {
            $feeCatelog = \App\Models\Fee05Catelog::find($feeCatelogId);
            if ($feeCatelog) {
                $this->myclass_id = $feeCatelog->myclass_id;
                $this->fee_category_id = $feeCatelog->fee_category_id;
                $this->fee_particular_id = $feeCatelog->fee_particular_id;
                $this->amount = $feeCatelog->amount;
                $this->fee_collection_type = $feeCatelog->fee_collection_type;
            }
        } else {
            // Reset the form fields if no feeCatelogId is provided
            $this->reset(['myclass_id', 'fee_category_id', 'fee_particular_id', 'amount', 'fee_collection_type']);
        }
        $this->showModal = true;
        // $this->resetErrorBag();
        // $this->reset(['myclass_id', 'fee_category_id', 'fee_particular_id', 'amount', 'fee_collection_type']);
    }
    
    public function closeModal()
    {
        $this->showModal = false;
        $this->resetErrorBag();
        $this->reset(['myclass_id', 'fee_category_id', 'fee_particular_id', 'amount', 'fee_collection_type']);
    }


    public function save($feeCatelogId = null){

        // Validate the input data
        // Ensure that the fee_collection_type is one of the allowed values
        $this->validate([
            'myclass_id' => 'required|exists:myclasses,id',
            'fee_category_id' => 'required|exists:fee01_categories,id',
            'fee_particular_id' => 'required|exists:fee02_particulars,id',
            'amount' => 'required|numeric|min:0',
            'fee_collection_type' => 'required|in:One-Time,Monthly,Quarterly,Yearly',
        ]);


        try{

        \App\Models\Fee05Catelog::updateOrCreate([
            'id' => $feeCatelogId,
        ], [
            'myclass_id' => $this->myclass_id,
            'fee_category_id' => $this->fee_category_id,
            'fee_particular_id' => $this->fee_particular_id,
            'amount' => $this->amount,
            'fee_collection_type' => $this->fee_collection_type,
        ]);


        // Reset the form fields
        $this->reset(['myclass_id', 'fee_category_id', 'fee_particular_id', 'amount', 'fee_collection_type']);
        // Refresh the fee catalogs
        $this->feeCatalogs = \App\Models\Fee05Catelog::with(['myclass', 'feeCategory', 'feeParticular'])
            ->currentlyActive()
            ->whereHas('myclass', function($query) {
                $query->where('is_active', true);
            })
            ->orderBy('created_at', 'desc')
            ->get();

            session()->flash('success', 'Fee catalog saved successfully!');
        }catch(\Exception $e){
            // Handle the exception, e.g., log it or show an error message
            session()->flash('error', 'Failed to save fee catalog: ' . $e->getMessage());
            
        }
        
        $this->closeModal();
        $this->emit('feeCatalogUpdated'); // Refresh parent component
    }



    public function render()
    {
        return view('livewire.fee06-catelog-comp', [
            'classes' => \App\Models\MyClass::all(),
            'feeCategories' => \App\Models\Fee01Category::all(),
            'feeParticulars' => \App\Models\Fee02Particular::all(),
        ]);
    }

    
}
