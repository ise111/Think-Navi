<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThinkFiles extends Model
{
    public function User() 
    {
        return $this->belongsTo('App\Models\User');
    }
    public function Thinks()
    {
        return $this->hasMany('App\Models\Models\Thinks', 'ThinkFiles_id');
    }
    public function ThinkTargets()
    {
        return $this->hasMany('App\Models\Models\ThinkTargetFiles', 'ThinkFiles_id');
    }

    protected $table = "ThinkFiles";
}
