<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class results extends Model
{
    use HasFactory;
    protected $fillable = [
        'letter_id',
        'notes',
        'presence_recipients'
    ];
}
