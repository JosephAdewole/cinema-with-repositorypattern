<?php

namespace App\Interfaces;

interface CinemaRepositoryInterface 
{
    public function getAllCinemas();
    public function getCinemaById($CinemaId);
    public function deleteCinema($CinemaId);
    public function createCinema(array $CinemaDetails);
    public function updateCinema($CinemaId, array $newDetails);
}
