<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThinksInGroup extends Model
{
    protected $fillable = [
        'name',
        'ThinkGroups_id',
        'content_border_color',
        'content_text_color',
        'content_bg_color',
        'content_font_size',
    ];

    public function ThinkGroup()
    {
        return $this->belongsTo('App\Models\Models\ThinkGroups', 'ThinkGroups_id');
    }

    protected $table = "ThinksInGroup";
}
