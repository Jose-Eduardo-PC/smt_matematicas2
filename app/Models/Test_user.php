<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'user_id',
        'points',
        'status',

    ];

    public function user()
    {
        return $this->belongsTo((User::class));
    }
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
    public function test()
    {
        return $this->belongsTo((Test::class));
    }

    public function solved_exam()
    {
        return $this->hasMany(Solved_exam::class);
    }
}
