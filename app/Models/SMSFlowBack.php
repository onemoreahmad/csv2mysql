<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMSFlowBack extends Model
{
    use HasFactory;

    protected $table = 'SMSFlowBack';
    public $timestamps = false;
}
