<?php

namespace App\Http\Controllers;

use App\Http\Requests\Agf\AgfRequest;
use App\Models\Agf;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AgfController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Agf::all(), 200);
    }

    public function store(AgfRequest $request): JsonResponse
    {
        $payload = $request->validated();

        $agf = Agf::create($payload);

        return response()->json($agf, 201);
    }

    public function show(string $id): JsonResponse
    {
        $agf = Agf::findOrFail($id);
        return response()->json($agf, 200);
    }

    public function update(AgfRequest $request, string $id): JsonResponse
    {
        $payload = $request->validated();

        $agf = Agf::findOrFail($id);
        $agf->update($payload);

        return response()->json($agf, 200);
    }

    public function destroy(string $id): JsonResponse
    {
        $agf = Agf::findOrFail($id);
        $agf->delete();

        return response()->json([
            'message' => 'Agf deleted successfully'
        ], 200);
    }


}
