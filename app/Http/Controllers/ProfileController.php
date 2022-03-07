<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //This method is not used, since we're getting the profiles from the user.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProfileRequest $request)
    {
        UserProfile::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'message' => 'Profile created.'
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //TODO: Reserved for further implementation.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO: Reserved for further implementation.
    }
}
