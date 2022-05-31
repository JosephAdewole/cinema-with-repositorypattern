<?php

namespace App\Repositories;

use App\Interfaces\MovieRepositoryInterface;
use App\Models\Movie;
use App\Models\Cinema;
use App\Models\Schedule;

class MovieRepository implements MovieRepositoryInterface 
{
    public function getAllMovies() 
    {
        $movies = Movie::with(['cinemas','schedules'])->get();
        return $movies;
    }

    public function getMovieById($MovieId) 
    {
        return Movie::findOrFail($MovieId);
    }

    public function deleteMovie($MovieId) 
    {
        Movie::destroy($MovieId);
    }

    public function createMovie(array $MovieDetails) 
    {
        $response = Movie::create($MovieDetails);
        return $response;
    }

    public function updateMovie($MovieId, array $newDetails) 
    {
        return Movie::whereId($MovieId)->update($newDetails);
    }

}
