<?php

namespace App\Http\Controllers;

use App\Interfaces\MovieRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller 
{
    private MovieRepositoryInterface $movieRepository;

    public function __construct(MovieRepositoryInterface $movieRepository) 
    {
        $this->movieRepository = $movieRepository;
    }

    public function index(): JsonResponse 
    {
        return response()->json([
            'data' => $this->movieRepository->getAllMovies()
        ]);
    }

    public function store(Request $request): JsonResponse 
    {
        $movieDetails = $request->only([
            //
        ]);

        return response()->json(
            [
                'data' => $this->movieRepository->createMovie($movieDetails)
            ],
            Response::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse 
    {
        $movieId = $request->route('id');

        return response()->json([
            'data' => $this->movieRepository->getMovieById($movieId)
        ]);
    }

    public function update(Request $request): JsonResponse 
    {
        $movieId = $request->route('id');
        $movieDetails = $request->only([
            //
        ]);

        return response()->json([
            'data' => $this->movieRepository->updateMovie($movieId, $movieDetails)
        ]);
    }

    public function destroy(Request $request): JsonResponse 
    {
        $movieId = $request->route('id');
        $this->movieRepository->deleteMovie($movieId);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
