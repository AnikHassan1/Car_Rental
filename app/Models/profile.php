<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class profile extends Model {
    // protected $fillable = [
    //     'number', 'address','user_id'
    // ];

    protected $guarded = ["id"];



    public function user():BelongsTo {
        return $this->belongsTo( User::class );
    }
}