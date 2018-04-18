<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distro extends Model
{
    protected $fillable = [
        'name', 'image_path', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
