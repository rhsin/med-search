<?php

namespace App\Http\Controllers\API;

use App\Models\Med;
use App\Models\User;
use App\Http\Resources\Med as MedResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedController extends Controller
{
    public function search($name)
    {
        $meds = Med::where('name', 'like', '%'. $name . '%')->get();
        if (count($meds) > 0) {
            return MedResource::collection($meds);
        } else {
            abort(404, 'Medication not found');
        }
    }

    public function searchFirst($name)
    {
        $med = Med::where('name', 'like', '%'. $name . '%')->firstOrFail();
        return new MedResource($med);
    }

    public function update(Request $request, $id)
    {
        // $user = $request->user();
        User::find(1)->meds()->attach($id);
        return response('Attached!', 201);
    }

    public function destroy($id)
    {
        User::find(1)->meds()->detach($id);
        return response('Detached!', 204);
    }
}
