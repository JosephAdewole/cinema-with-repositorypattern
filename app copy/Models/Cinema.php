<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Schedule;


class Cinema extends Model
{
    use HasFactory;

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'cinema_movie_schedule');
    }

    public function schedules()
    {
        return $this->belongsToMany(Schedule::class, 'cinema_movie_schedule');
    }
}
