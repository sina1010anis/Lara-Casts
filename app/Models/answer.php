<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','thread' , 'content' , 'title' , 'action'];
    public function users()
    {
        return $this->belongsTo(User::class , 'user_id' ,'id');
    }
    public function threads()
    {
        return $this->belongsTo(thread::class);
    }
    public function reply()
    {
        return $this->hasMany(reply::class);
    }
}
