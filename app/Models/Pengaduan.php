<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';

    protected $guarded;


    // convert timestamps

    protected $casts = [
        'created_at' => 'datetime'
    ];

}
