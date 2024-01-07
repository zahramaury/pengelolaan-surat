<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetterType extends Model
{
    use HasFactory;
    protected $fillable = [
        'letter_code',
        'name_type',
    ];

     public function user()
     {
        return $this->hasMany(User::class);
     }

    //  public function letter() {
    //      return $this->hasMany(Letters::class, 'letter_type_id', 'id');
    //  }
}
