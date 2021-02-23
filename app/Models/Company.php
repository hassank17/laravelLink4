<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 
        'last_name',
        'email',
        'password',
        'abn_number',
        'organisation_name',
        'state',
        'po_number',
        'is_gst'
    ];    
}
