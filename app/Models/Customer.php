<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'Surname',
        'Address',
        'created_at',
        'Number of command',
        'Mail_address'
    ];
}
