<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    use HasFactory;
    protected $fillable = ['location','sensor_id','value','unit'];
    public function sensors()
    {
        return $this->belongsTo(sensors::class);
    }
}
