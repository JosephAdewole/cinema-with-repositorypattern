<?php

namespace App\Repositories;

use App\Interfaces\MovieRepositoryInterface;
use App\Models\Movie;

class MovieRepository implements MovieRepositoryInterface 
{
    public function getAllMovies() 
    {
        return Movie::all();
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
        return Movie::create($MovieDetails);
    }

    public function updateMovie($MovieId, array $newDetails) 
    {
        return Movie::whereId($MovieId)->update($newDetails);
    }

}
