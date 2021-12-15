<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Well extends Model
{
    use HasFactory;

    protected $fillable = [
        'well_name',
        'well_number',
    ];
    
    public function blocks()
    {
        return $this->hasMany(SMSFlowBack::class);
    }
}
