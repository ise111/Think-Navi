<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThinkGoals extends Model
{
    protected $fillable = [
        'content',
        'category',
        'category_group',
        'ThinkFileGoals_id'
    ];

    public function ThinkGoalFiles()
    {
        return $this->belongsTo('App\Models\Models\ThinkGoalFiles', 'ThinkFileGoals_id');
    }

    protected $table = "ThinkGoals";
}
