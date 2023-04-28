<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Example extends Model
{
    use HasFactory;

    protected $fillable = [
        'text_ejm',
        'image_ejm',
        'content_id',
    ];

    public function content()
    {
        return $this->belongsTo((Content::class));
    }
}
