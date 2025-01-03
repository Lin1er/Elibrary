<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'book_id',
        'comment_id',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke komentar parent
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    // Relasi ke komentar anak (reply)
    public function replies()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }
}
