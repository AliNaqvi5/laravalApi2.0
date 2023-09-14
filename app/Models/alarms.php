<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alarms extends Model
{
    use HasFactory;
    protected $fillable = ['sensor_id','title',"acknowledge"];
    public function sensors()
    {
        return $this->belongsTo(sensors::class);
    }
}
