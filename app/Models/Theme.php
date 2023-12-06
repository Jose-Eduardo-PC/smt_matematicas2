<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_theme',
        'description',
    ];

    public function activitys()
    {
        return $this->hasManys(Activity::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
    public function media_resources()
    {
        return $this->hasMany(Media_resource::class);
    }
    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
