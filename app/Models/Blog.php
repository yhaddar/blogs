<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'category',
        'image',
    ];

    protected function user()
    {
        return $this -> belongsTo(User::class,'user_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
