<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'theme_id',
        'user_id',
        'visits',
        'likes',
        'theme_id',
        'user_id',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function themes()
    {
        return $this->belongsToMany(Theme::class);
    }
}
