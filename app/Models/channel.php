<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class channel extends Model
{
    use HasFactory;

    protected $fillable = ['name','slag','username','body' , 'body' ,'model'];
    protected $attributes =['view' => 0,'comment' => 0,'status' => 0];
    public function threads()
    {
        return $this->hasMany(thread::class);
    }
    public function users()
    {
        return $this->belongsTo(User::class , 'user_id' ,'id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
