<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityEvent extends Model
{
   protected $fillable = [
        'title',
        'description',
        'venue',
        'starts_at',
        'banner_image'
    ];
}
