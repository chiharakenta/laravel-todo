<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'content', 'category_id',
    ];

    // タスクのカテゴリーを取得
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
