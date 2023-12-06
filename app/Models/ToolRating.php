<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolRating extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'tool_name', 'rating'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
