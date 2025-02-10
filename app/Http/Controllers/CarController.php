<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Crear un nuevo carro
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'color' => 'required|string',
            'price' => 'required|numeric'
        ]);

        $car = Car::create($request->all());
        return response()->json($car, 201);
    }

    // Listar todos los carros
    public function index()
    {
        return response()->json(Car::all(), 200);
    }

    // Mostrar un carro específico
    public function show($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }
        return response()->json($car, 200);
    }

    // Actualizar un carro
    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $request->validate([
            'brand' => 'sometimes|required|string',
            'model' => 'sometimes|required|string',
            'year' => 'sometimes|required|integer',
            'color' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric'
        ]);

        $car->update($request->all());
        return response()->json($car, 200);
    }

    // Eliminar un carro
    public function destroy($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->delete();
        return response()->json(['message' => 'Car deleted successfully'], 200);
    }
}
