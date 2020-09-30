<?php

namespace App\Http\Controllers\API;

use App\Models\Med;
use App\Http\Resources\Med as MedResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // Search database for medications with given name as substring.
    // Return JSON resource collection if any are found, else 404 error.
    public function search($name)
    {
        $meds = Med::where('name', 'like', '%'. $name . '%')->get();
        if (count($meds) > 0) {
            return MedResource::collection($meds);
        } else {
            abort(404, 'Medication not found');
        }
    }

    // Search database for first medication with given name as substring.
    // Return JSON resource collection if any are found, else 404 error.
    public function searchFirst($name)
    {
        $med = Med::where('name', 'like', '%'. $name . '%')->firstOrFail();
        return new MedResource($med);
    }
}
