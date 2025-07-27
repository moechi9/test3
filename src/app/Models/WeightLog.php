<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'date',
        'weight',
        'calories',
        'exercise_time',
        'exercise_content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        'date' => 'datetime',
        'exercise_time' => 'datetime'
    ];

    protected $sortable = ['date'];
}
