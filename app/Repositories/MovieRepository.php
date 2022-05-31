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
        // return Movie::with('cinemas')->get();

        $movies = Movie::with(['cinemas','schedules'])->get();
        
        // foreach($movies as $movie){
        //     $schedules = Schedule::where('movie_id', $movie->id )->get();
        //     $schedulelist = [];
        //     foreach($schedules as $schedule){
        //         // array_push($schedulelist, $schedule->showtime => $schedule->showtime);

        //         $cinemas = Cinema::all();
        //         foreach ($cinemas as $cinema) {
        //             $cinema = Cinema::where('id',$schedule->cinema_id)->value('name');
        //             // echo($cinema);
        //             // array_push($schedulelist[$cinema], $schedule->showtime);
        //             $schedulelist[$cinema] = $schedule->showtime;
        //         }
                
        //     }
        //     $movie->schedules = $schedulelist;
        // }

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
        // $cinemas = Cinema::all();
        // $response->cinemas()->attach($cinemas);

        return $response;
    }

    public function updateMovie($MovieId, array $newDetails) 
    {
        return Movie::whereId($MovieId)->update($newDetails);
    }

}
