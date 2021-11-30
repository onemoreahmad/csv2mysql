<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMSFlowBack extends Model
{
    use HasFactory;

    protected $table = 'sms_flow_back';
    // public $timestamps = false;

    public function well()
    {
        return $this->belongsTo(Well::class);
    }
 
}
