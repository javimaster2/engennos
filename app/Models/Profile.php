<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    
    //relacion uno a uno inversa
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
