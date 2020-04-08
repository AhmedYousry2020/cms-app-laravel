<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\post;
class categories extends Model
{
    protected $fillable = ['name'];
    public function posts()
    {
        return $this->hasMany(post::class);
    }
}
