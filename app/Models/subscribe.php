<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscribe extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','thread_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function threads()
    {
        return $this->belongsTo(thread::class);
    }
}
