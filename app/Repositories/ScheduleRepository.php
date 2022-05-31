<?php

namespace App\Repositories;

use App\Interfaces\ScheduleRepositoryInterface;
use App\Models\Schedule;
use App\Models\Movie;
use App\Models\Cinema;
use App\Models\ShowtimeRelate;

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
        $schedule = new Schedule();
        $schedule->showtime = $ScheduleDetails['showtime'];
        $schedule->save();

        $schedule->cinemas()->attach($ScheduleDetails['cinema_id'], ['movie_id' => $ScheduleDetails['movie_id']]);
        return $schedule;
    }

    public function updateSchedule($ScheduleId, array $newDetails) 
    {
        return Schedule::whereId($ScheduleId)->update($newDetails);
    }

}
