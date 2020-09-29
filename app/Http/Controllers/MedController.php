<?php

namespace App\Http\Controllers;

use App\Models\Med;
use App\Models\User;
use App\Http\Resources\Med as MedResource;
use Illuminate\Http\Request;

class MedController extends Controller
{
    public function search($name)
    {
        // $this->authorize('user');
        $meds = Med::where('name', 'like', '%'. $name . '%')->get();
        if (count($meds) > 0) {
            return MedResource::collection($meds);
        } else {
            abort(404, 'Medication not found');
        }
    }

    public function searchFirst($name)
    {
        // $this->authorize('user');
        $med = Med::where('name', 'like', '%'. $name . '%')->firstOrFail();
        return new MedResource($med);
    }

    public function update(Request $request, $id)
    {
        // $this->authorize('user');
        $user = $request->user();
        User::find(1)->meds()->attach($id);
        return response('Attached!', 201);
    }

    public function destroy(Request $request, $id)
    {
        // $this->authorize('user');
        $user = $request->user();
        User::find(1)->meds()->detach($id);
        return response('Detached!', 204);
    }
}
