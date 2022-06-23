<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThinkGroups extends Model
{
    public function ThinkFile()
    {
        return $this->belongsTo('App\Models\Models\ThinkFiles', 'ThinkFiles_id');
    }

    public function ThinksInGroup()
    {
        return $this->hasMany('App\Models\Models\ThinksInGroups', 'ThinkGroups_id');
    }

    protected $table = "ThinkGroups";
}
