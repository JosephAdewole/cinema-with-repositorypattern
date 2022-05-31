<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Cinema;


class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['showtime'];

    public function cinemas()
    {
        return $this->belongsToMany(Cinema::class, 'cinema_movie_schedule');
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'cinema_movie_schedule');
    }

}




