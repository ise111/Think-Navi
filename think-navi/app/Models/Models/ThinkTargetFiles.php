<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThinkTargetFiles extends Model
{
    public function ThinkFile()
    {
        return $this->belongsTo('App\Models\Models\ThinkFiles', 'ThinkFiles_id');
    }

    public function ThinkTargets()
    {
        return $this->hasMany('App\Models\Models\ThinkTargets', 'ThinkFileTargets_id');
    }

    protected $table = "ThinkTargetFiles";
}
