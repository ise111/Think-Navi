<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThinkTargets extends Model
{
    protected $fillable = [
        'content',
        'category',
        'category_group',
        'ThinkFileTargets_id'
    ];

    public function ThinkTargetFile()
    {
        return $this->belongsTo('App\Models\Models\ThinkTargetFiles', 'ThinkFileTargets_id');
    }

    protected $table = "ThinkTargets";
}
