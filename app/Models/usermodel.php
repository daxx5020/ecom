<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usermodel extends Model
{
    use HasFactory;


    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'firstname',
        'mobileno',
        'address_line_1',
        'address_line_2',
        'email',
        'password',
    ];
}
