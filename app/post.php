<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\categories;
use App\User;
class post extends Model
{
      use SoftDeletes;
     protected $fillable = ['title','description','content','image','categories_id','user_id'];
     public function category()
    {
        return $this->belongsTo(categories::class,'categories_id');
    }
     public function tags()
    {
        return $this->belongsToMany('\App\Tag');
    }
    public function hasTag($tagId) {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }
     public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
