<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class controls extends Model
{
    use HasFactory;

    protected $fillable = ["nameControl","value"];
}
