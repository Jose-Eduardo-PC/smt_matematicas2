<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_activity',
        'description',
        'link_acti',
        'theme_id',
    ];

    public function theme()
    {
        return $this->belongsTo((Theme::class));
    }
}
