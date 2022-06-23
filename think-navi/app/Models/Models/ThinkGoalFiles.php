<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThinkGoalFiles extends Model
{
    public function ThinkFile()
    {
        return $this->belongsTo('App\Models\Models\ThinkFiles', 'ThinkFiles_id');
    }

    public function ThinkGoals()
    {
        return $this->hasMany('App\Models\Models\ThinkGoals', 'ThinkFileGoals_id');
    }

    protected $table = "ThinkGoalFiles";
}
