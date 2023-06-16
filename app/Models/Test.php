<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_test',
        'content',
        'theme_id',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function test_user()
    {
        return $this->hasMany(Test_user::class);
    }
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
