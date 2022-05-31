<?php

namespace App\Http\Controllers;

use App\Interfaces\ScheduleRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScheduleController extends Controller 
{
    private ScheduleRepositoryInterface $cinemaRepository;

    public function __construct(ScheduleRepositoryInterface $cinemaRepository) 
    {
        $this->cinemaRepository = $cinemaRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->cinemaRepository->getAllSchedules()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $cinemaDetails = $request->only([
            'name',
        ]);

        
        return response()->json(
            [
                'data' => $this->cinemaRepository->createSchedule($cinemaDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $cinemaId = $request->route('id');

        return response()->json([
            'data' => $this->cinemaRepository->getScheduleById($cinemaId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $cinemaId = $request->route('id');
        $cinemaDetails = $request->only([
            //
        ]);

        return response()->json([
            'data' => $this->cinemaRepository->updateSchedule($cinemaId, $cinemaDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $cinemaId = $request->route('id');
        $this->cinemaRepository->deleteSchedule($cinemaId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }


    public function showpage(Request $request)
    {
        $cinemaId = $request->route('id');

        return view('cinemas.single', compact('cinemaId'));
    }
    
}
