<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_cont',
        'text_cont',
        'image_cont',
        'theme_id',
    ];

    public function theme()
    {
        return $this->belongsTo((Theme::class));
    }

    public function examples()
    {
        return $this->hasMany(example::class);
    }
}
