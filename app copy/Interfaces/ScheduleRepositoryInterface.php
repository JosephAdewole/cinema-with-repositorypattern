<?php

namespace App\Interfaces;

interface ScheduleRepositoryInterface 
{
    public function getAllSchedules();
    public function getScheduleById($ScheduleId);
    public function deleteSchedule($ScheduleId);
    public function createSchedule(array $ScheduleDetails);
    public function updateSchedule($ScheduleId, array $newDetails);
}
