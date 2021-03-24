<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    use HasFactory;

    protected $fillable = ['content' , 'user_id' , 'answer_id'];

    protected $table = 'reply';

    public function users()
    {
        return $this->belongsTo(User::class , 'user_id' ,'id');
    }
    public function answers()
    {
        return $this->belongsTo(answer::class , 'answer_id' ,'id');
    }
}
