<?php

namespace App\Interfaces;

interface MovieRepositoryInterface 
{
    public function getAllMovies();
    public function getMovieById($MovieId);
    public function deleteMovie($MovieId);
    public function createMovie(array $MovieDetails);
    public function updateMovie($MovieId, array $newDetails);
}
