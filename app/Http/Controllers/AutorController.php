<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Http\Requests\AutorRequest;
use App\Http\Resources\AutorResource;

class AutorController extends Controller
{
    public function index()
    {
        return AutorResource::collection(Autor::all());
    }

    public function store(AutorRequest $request)
    {
        $autor = Autor::create($request->validated());
        return new AutorResource($autor);
    }

    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return new AutorResource($autor);
    }

    public function update(AutorRequest $request, $id)
    {
        $autor = Autor::findOrFail($id);
        $autor->update($request->validated());
        return new AutorResource($autor);
    }

    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();
        return response()->json(null, 204);
    }

    // Endpoint específico con eager loading: GET /api/autores/{id}/libros
    public function libros($id)
    {
        $autor = Autor::with('libros')->findOrFail($id);
        return new AutorResource($autor);
    }
}
