<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "address",
        "phone",
        "email",
        "stars",
        "check_in_time",
        "check_out_time"
    ];
}
