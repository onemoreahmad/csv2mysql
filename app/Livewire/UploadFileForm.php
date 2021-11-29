<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\HeadingRowImport;

class UploadFileForm extends Component
{
    use WithFileUploads;
 
    public $file;
    public $success = false;
  
    public function submit()
    {
        $this->validate([
            'file' => 'required|file|mimes:csv,xlsx', // 1MB Max
        ]);
   
        // get field name 
        $headings_to_get_field_name = (new HeadingRowImport(2))->toArray($this->file);
        $field_name = data_get(collect($headings_to_get_field_name)->flatten(), '14');
        if(!$field_name){
            dd('Field name not found.');
        }

        // get well number
        $headings_to_get_well_number = (new HeadingRowImport(3))->toArray($this->file);
        $well_number = data_get(collect($headings_to_get_well_number)->flatten(), '14');
        if(!$well_number){
            dd('Well number not found.');
        }
  
        // import all data
        \Excel::import(new \App\Imports\SMSFlowBackImport($field_name, $well_number), $this->file);

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
