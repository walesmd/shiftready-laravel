<?php

namespace App\Http\Controllers;

use App\Services\GoogleMapsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    public function autocomplete(Request $request, GoogleMapsService $service): JsonResponse
    {
        $validated = $request->validate([
            'input' => ['required', 'string', 'min:3', 'max:100'],
            'session_token' => ['required', 'string'],
        ]);

        $predictions = $service->autocomplete($validated['input'], $validated['session_token']);

        return response()->json([
            'predictions' => array_map(
                fn ($result) => [
                    'place_id' => $result->placeId,
                    'description' => $result->description,
                ],
                $predictions,
            ),
        ]);
    }
}
