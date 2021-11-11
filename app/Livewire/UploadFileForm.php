<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadFileForm extends Component
{
    use WithFileUploads;
 
    public $file;
    public $success = false;
 
    public function submit()
    {
        $this->validate([
            'file' => 'required|file|mimes:csv', // 1MB Max
        ]);
  
        \Excel::import(new \App\Imports\SMSFlowBackImport, $this->file);

        $this->success = true;
        $this->emit('fileUploaded');
    }
  
    public function resetErrors()
    {
        $this->resetErrorBag();
    }
  
    public function render()
    {
        return view('livewire.upload-file-form');
    }
}
