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
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function test_user()
    {
        return $this->hasMany(test_user::class);
    }
}
