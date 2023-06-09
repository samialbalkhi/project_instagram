<?php

namespace App\Models;

use App\Models\User;
use App\Models\Like;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['caption', 'user_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imagetable');
    }
    public function likeBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
