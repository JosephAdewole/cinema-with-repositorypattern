<?php

namespace App\Http\Controllers;

use App\Interfaces\ScheduleRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScheduleController extends Controller 
{
    private ScheduleRepositoryInterface $scheduleRepository;

    public function __construct(ScheduleRepositoryInterface $scheduleRepository) 
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->scheduleRepository->getAllSchedules()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $scheduleDetails = $request->only([
            'showtime', 'cinema_id', 'movie_id'
        ]);

        
        return response()->json(
            [
                'data' => $this->scheduleRepository->createSchedule($scheduleDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $scheduleId = $request->route('id');

        return response()->json([
            'data' => $this->scheduleRepository->getScheduleById($scheduleId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $scheduleId = $request->route('id');
        $scheduleDetails = $request->only([
            //
        ]);

        return response()->json([
            'data' => $this->scheduleRepository->updateSchedule($scheduleId, $scheduleDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $scheduleId = $request->route('id');
        $this->scheduleRepository->deleteSchedule($scheduleId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }


    public function showpage(Request $request)
    {
        $scheduleId = $request->route('id');

        return view('schedules.single', compact('scheduleId'));
    }
    
}
