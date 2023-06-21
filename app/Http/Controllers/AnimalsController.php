<?php

namespace App\Http\Controllers;

use App\Services\AnimalService;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{

    public AnimalService $animalService;

    public function __construct(AnimalService $animalService)
    {
        $this->animalService = $animalService;
        // $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $animals = $this->animalService->showAnimals($request);

        return $animals;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $animal = $this->animalService->postAnimal($request);

        return $animal;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $animal = $this->animalService->showAnimal($id);

        return $animal;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $animal = $this->animalService->editAnimal($request, $id);

        return $animal;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $animal = $this->animalService->deleteAnimal($id);

        return $animal;
    }
}
