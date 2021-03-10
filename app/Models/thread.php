<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thread extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','channel_id' , 'answer_id','content','slag','title','flag'];
    public function channels()
    {
        return $this->belongsTo(channel::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function answers()
    {
        return $this->hasMany(answer::class);
    }
}
