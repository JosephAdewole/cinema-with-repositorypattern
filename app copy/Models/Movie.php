<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cinema;
use App\Models\Schedule;


class Movie extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cinemas()
    {
        return $this->belongsToMany(Cinema::class, 'cinema_movie_schedule');
    }
    public function schedules()
    {
        return $this->belongsToMany(Schedule::class, 'cinema_movie_schedule');
    }
}
