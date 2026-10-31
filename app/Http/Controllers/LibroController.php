<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Http\Requests\LibroRequest;
use App\Http\Resources\LibroResource;

class LibroController extends Controller
{
    public function index()
    {
        return LibroResource::collection(Libro::all());
    }

    public function store(LibroRequest $request)
    {
        $libro = Libro::create($request->validated());
        return new LibroResource($libro);
    }

    public function show($id)
    {
        $libro = Libro::findOrFail($id);
        return new LibroResource($libro);
    }

    public function update(LibroRequest $request, $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->update($request->validated());
        return new LibroResource($libro);
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();
        return response()->json(null, 204);
    }
}

