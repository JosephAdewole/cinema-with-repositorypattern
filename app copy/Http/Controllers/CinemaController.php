<?php

namespace App\Http\Controllers;

use App\Interfaces\CinemaRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CinemaController extends Controller 
{
    private CinemaRepositoryInterface $cinemaRepository;

    public function __construct(CinemaRepositoryInterface $cinemaRepository) 
    {
        $this->cinemaRepository = $cinemaRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->cinemaRepository->getAllCinemas()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $cinemaDetails = $request->only([
            'name',
        ]);

        
        return response()->json(
            [
                'data' => $this->cinemaRepository->createCinema($cinemaDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $cinemaId = $request->route('id');

        return response()->json([
            'data' => $this->cinemaRepository->getCinemaById($cinemaId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $cinemaId = $request->route('id');
        $cinemaDetails = $request->only([
            //
        ]);

        return response()->json([
            'data' => $this->cinemaRepository->updateCinema($cinemaId, $cinemaDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $cinemaId = $request->route('id');
        $this->cinemaRepository->deleteCinema($cinemaId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }


    public function showpage(Request $request)
    {
        $cinemaId = $request->route('id');

        return view('cinemas.single', compact('cinemaId'));
    }
    
}
