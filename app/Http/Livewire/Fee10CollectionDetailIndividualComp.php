<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Fee10CollectionDetailIndividualComp extends Component{

    public $studentcr = null, $mandateDate = null, $feeStructure = null;
    public $storedCaptcha = null, $inputCaptcha = null, $isVerifiedCaptcha = false;

    public function mount($studentcrId = null, $mandateDateId = null, $feeStructureId = null){
        // Initialize properties if needed
        // dd($studentcrId, $mandateDateId, $feeStructureId);
        if ($studentcrId) {
            $this->studentcr = \App\Models\Studentcr::find($studentcrId);
        }
        if ($mandateDateId) {
            $this->mandateDate = \App\Models\Fee04MandateDate::find($mandateDateId);
        }
        if ($feeStructureId) {
            $this->feeStructure = \App\Models\Fee06Structure::find($feeStructureId);
        }


        
        $this->generateCaptcha(); // Generate a new captcha when the component is mounted
    }

    public function generateCaptcha(){
        $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $captchaText = '';
        
        for ($i = 0; $i < 6; $i++) {
            $captchaText .= $chars[rand(0, strlen($chars) - 1)];
        }
        
        $this->storedCaptcha = $captchaText;
        $this->inputCaptcha = '';
        $this->isVerifiedCaptcha = false;
    }

    public function verifyAndPrint()
    {
        if (strtoupper($this->inputCaptcha) === $this->storedCaptcha) {
            $this->isVerifiedCaptcha = true;
            $this->emit('printReceipt');
        } else {
            $this->isVerifiedCaptcha = false;
            $this->generateCaptcha();
        }
        // dd($this->isVerifiedCaptcha, $this->storedCaptcha, $this->inputCaptcha);
    }


    public function render()
    {
        return view('livewire.fee10-collection-detail-individual-comp');
    }
}
