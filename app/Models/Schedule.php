<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;
use App\Models\Cinema;


class Schedule extends Model
{
    use HasFactory;

    public function movie()
    {
        return $this->hasOne(Movie::class);
    }
    public function cinema()
    {
        return $this->hasOne(Cinema::class);
    }
}




