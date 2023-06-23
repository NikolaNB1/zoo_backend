<?php

namespace App\Services;

use App\Models\Animal;
use Illuminate\Http\Request;


class AnimalService
{

    public function showAnimals(Request $request)
    {
        $animals = Animal::paginate(10);

        return $animals;
    }

    public function postAnimal(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|string',
            'type' => 'required|string',
            'habitat' => 'required|string',
            'rare' => 'boolean',
            'count_in_zoo' => 'required|integer',
            'favorite_food' => 'required|string',
        ]);

        $animal = new Animal();

        $animal->name = $request->name;
        $animal->type = $request->type;
        $animal->habitat = $request->habitat;
        $animal->rare = $request->rare;
        $animal->count_in_zoo = $request->count_in_zoo;
        $animal->favorite_food = $request->favorite_food;
        $animal->save();

        return $animal;
    }

    public function showAnimal($id)
    {
        $animal = Animal::find($id);
        return $animal;
    }

    public function editAnimal(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|string',
            'type' => 'required|string',
            'habitat' => 'required|string',
            'rare' => 'boolean',
            'count_in_zoo' => 'required|integer',
            'favorite_food' => 'required|string',
        ]);

        $animal = Animal::find($id);

        $animal->name = $request->name;
        $animal->type = $request->type;
        $animal->habitat = $request->habitat;
        $animal->rare = $request->rare;
        $animal->count_in_zoo = $request->count_in_zoo;
        $animal->favorite_food = $request->favorite_food;
        $animal->save();

        return $animal;
    }

    public function deleteAnimal($id)
    {
        Animal::destroy($id);
    }
}
