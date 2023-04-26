<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Service\UserService;
use Termwind\Components\Dd;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $users = $this->userService->index($request->all());
            return response()->json($users, 200);
        } catch (\Throwable $th) {
           return response()->json($th, 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        try {
            return  $this->userService->store($request->all());
        } catch (\Throwable $th) {
            return response($th);
        }
        // return $validatation;
        // if ($validatation->fails()) {
        //     $response['response'] = $validatation->messages();
        // } else {
        //     //process the request
        // }
        // return 1;
        // return User::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($user);
        try {
            $updatedUser = $this->userService->update($request->all(), $user);
            return response()->json($updatedUser, 200);

        } catch (\Throwable $th) {
            return response()->json($th->message, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
