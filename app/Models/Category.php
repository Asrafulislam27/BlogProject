<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'navbar_status',
        'status'
    ];

    public function posts(){
        return $this->hasMany(Post::class,'category_id','id');
    }

   
}
