<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Thinks extends Model
{
    use NodeTrait;
    protected $fillable = [
        'name',
        'category',
        'category_group',
        'ThinkFiles_id',
        'content_border_color',
        'content_text_color',
        'content_bg_color',
        'content_font_size',
        'have_navi',
    ];

    public function ThinkFile()
    {
        return $this->belongsTo('App\Models\Models\ThinkFiles', 'ThinkFiles_id');
    }
    
    public function ThinkMemo()
    {
        return $this->hasOne('App\Models\Models\ThinkMemos', 'Thinks_id');
    }

    protected $table = "Thinks";
}
