<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SMSFlowBack;
use Livewire\WithPagination;

class SmsFlowDataList extends Component
{
    use WithPagination;

    protected $listeners = ['fileUploaded' => 'render'];

    public function render()
    {
        $columns = SMSFlowBack::first() ? SMSFlowBack::first()->attributesToArray() : [] ;
   
        // $columns  = \Schema::getColumnListing((new SMSFlowBack)->getTable());
        return view('livewire.sms-flow-data-list', ['records' => SMSFlowBack::latest()->paginate(50), 'columns' => array_keys($columns)]);
    }
}
