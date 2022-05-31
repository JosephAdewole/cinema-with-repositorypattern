<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ShowtimeRelate extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'cinema_movie_schedule';

}
