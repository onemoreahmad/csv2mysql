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
        $columns  = \Schema::getColumnListing((new SMSFlowBack)->getTable());
        return view('livewire.sms-flow-data-list', ['records' => SMSFlowBack::paginate(50), 'columns' => $columns]);
    }
}
