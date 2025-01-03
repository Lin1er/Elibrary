<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaitList extends Model
{
    /** @use HasFactory<\Database\Factories\WaitListFactory> */
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'loan_date',
        'return_date',
        'status',
    ];

    public function casts()
    {
        return [
            'loan_date' => 'datetime',
            'return_date' => 'datetime',
        ];
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
