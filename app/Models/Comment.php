<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        
        'comment',
        'blog_id',
    ];

    protected $table  = 'comments';

    static public function getSingleData($id)
    {
        return Comment::find($id);
    }

}
