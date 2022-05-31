<?php

namespace App\Repositories;

use App\Interfaces\CinemaRepositoryInterface;
use App\Models\Cinema;

class CinemaRepository implements CinemaRepositoryInterface 
{
    public function getAllCinemas() 
    {
        return Cinema::all();
    }

    public function getCinemaById($CinemaId) 
    {
        return Cinema::findOrFail($CinemaId);
    }

    public function deleteCinema($CinemaId) 
    {
        Cinema::destroy($CinemaId);
    }

    public function createCinema(array $CinemaDetails) 
    {
        return Cinema::create($CinemaDetails);
    }

    public function updateCinema($CinemaId, array $newDetails) 
    {
        return Cinema::whereId($CinemaId)->update($newDetails);
    }

}
