<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'user_id',
    ];

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
