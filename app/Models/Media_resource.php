<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media_resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'link_video',
        'description',
        'resource_type',
        'theme_id',
    ];
    public function theme()
    {
        return $this->belongsTo((Theme::class));
    }
}
