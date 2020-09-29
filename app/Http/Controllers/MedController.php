<?php

namespace App\Http\Controllers;

use App\Models\Med;
use App\Http\Resources\Med as MedResource;
use Illuminate\Http\Request;

class MedController extends Controller
{
    public function search($name)
    {
        // $this->authorize('user');
        $meds = Med::where('name', 'like', '%'. $name . '%')->get();
        return MedResource::collection($meds);
    }

    public function searchFirst($name)
    {
        // $this->authorize('user');
        $med = Med::where('name', 'like', '%'. $name . '%')->first();
        return new MedResource($med);
    }

    public function update(Request $request, $id)
    {
        // $this->authorize('user');
        $user = $request->user();
        $user->meds()->attach($id);
        return response('Attached!', 201);
    }

    public function destroy(Request $request, $id)
    {
        // $this->authorize('user');
        $user = $request->user();
        $user->meds()->detach($id);
        return response('Detached!', 204);
    }
}
