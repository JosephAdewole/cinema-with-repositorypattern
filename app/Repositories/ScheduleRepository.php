<?php

namespace App\Repositories;

use App\Interfaces\ScheduleRepositoryInterface;
use App\Models\Schedule;
use App\Models\Movie;
use App\Models\Cinema;

class ScheduleRepository implements ScheduleRepositoryInterface 
{
    public function getAllSchedules() 
    {
        return Schedule::all();
    }

    public function getScheduleById($ScheduleId) 
    {
        return Schedule::findOrFail($ScheduleId);
    }

    public function deleteSchedule($ScheduleId) 
    {
        Schedule::destroy($ScheduleId);
    }

    public function createSchedule(array $ScheduleDetails) 
    {

        $response = Schedule::create($ScheduleDetails);
        $cinemas = Cinema::all();
        $movies = Movie::all();
        $response->cinemas()->attach($cinemas);
        $response->movies()->attach($movies);

        return $response;
    }

    public function updateSchedule($ScheduleId, array $newDetails) 
    {
        return Schedule::whereId($ScheduleId)->update($newDetails);
    }

}
