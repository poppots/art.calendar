<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'image_url',
        'user_id',
        'start',
        'end'
    ];
    
    // public function getPaginateByLimit(int $limit_count = 10)
    // {
    //     return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    // }
    
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}