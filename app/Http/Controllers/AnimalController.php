<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAnimal;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::orderBy('active', 'DESC')->orderBy('name', 'ASC')->paginate(4);
        return view('admin.animals.index', compact('animals'));
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $animals = Animal::when($request->searchName, function ($query, $searchName) {
            return $query->where('name', 'like', "%{$searchName}%");
        })->when($request->searchBreed, function ($query, $searchBreed) {
            return $query->where('breed', 'like', "%{$searchBreed}%");
        })->when($request->searchType, function ($query, $searchType) {
            return $query->where('type', 'like', "%{$searchType}%");
        }, function ($query) {
            return $query->orderBy('active', 'DESC')->orderBy('name', 'ASC');
        })->paginate(4);

        return view('admin.animals.index', compact('animals', 'filters'));
    }

    public function create()
    {
        $genders = ['Macho', 'Fêmea'];

        return view('admin.animals.create', compact('genders'));
    }

    public function store(StoreUpdateAnimal $request)
    {
        Animal::create($request->all());
        return redirect()->route('animals.index');
    }

    public function edit($id)
    {
        $animal = Animal::find($id);
        if (!$animal)
        {
            return redirect()->route('animals.index');
        }

        $genders = ['Macho', 'Fêmea'];
        
        return view('admin.animals.edit', compact('animal', 'genders'));
    }

    public function update(StoreUpdateAnimal $request, $id)
    {
        $animal = Animal::find($id);
        if (!$animal)
        {
            return redirect()->route('animals.index');
        }
        $animal->update($request->all());
        return redirect()->route('animals.index');
    }

    public function changeStatus($id)
    {
        $animal = Animal::find($id);
        if (!$animal)
        {
            return redirect()->route('animals.index');
        }

        $animal->active = !$animal->active;
        // dd($animal);
        $animal->update();
        return redirect()->route('animals.index');
    }
}
