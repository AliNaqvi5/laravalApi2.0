<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class farms extends Model
{
    use HasFactory;
    protected $fillable = ['name','location','area','timeOffset'];
}