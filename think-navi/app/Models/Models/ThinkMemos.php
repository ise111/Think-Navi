<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThinkMemos extends Model
{
    public function Think()
    {
        return $this->belongsTo('App\Models\Models\Thinks', 'Thinks_id');
    }

    protected $table = "ThinkMemos";
}
