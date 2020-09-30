<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    // Eloquent relationship attach method will add row to the pivot table
    // med_user to link the given medication(id) to the user(id). 
    public function update(Request $request, $id)
    {
        // $user = $request->user();
        User::find(1)->meds()->attach($id);
        return response('Attached!', 201);
    }

    // Eloquent relationship detach method will delete row to the pivot table
    // med_user to un-link the given medication(id) to the user(id). 
    public function destroy($id)
    {
        User::find(1)->meds()->detach($id);
        return response('Detached!', 204);
    }
}
