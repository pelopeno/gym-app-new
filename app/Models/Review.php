<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['title', 'content', 'image_path', 'status', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
