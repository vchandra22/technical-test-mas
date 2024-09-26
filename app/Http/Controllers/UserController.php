<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Services\UserService;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserController extends Controller
{

    protected $userService;

    // Constructor injection of UserService
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function search(Request $request): UserCollection
    {
        $page = $request->input('page', 1); // get nilai parameter 'page'
        $size = $request->input('size', 5); // get nilai parameter 'size'

        // array untuk filter berdasarkan input
        $filters = [
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'job_title' => $request->input('job_title'),
            'company' => $request->input('company'),
        ];

        // call service
        $users = $this->userService->searchUsers($filters, $page, $size);

        // kembalikan hasil dalam Collection
        return new UserCollection($users);
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
    public function store(UserCreateRequest $request): JsonResponse
    {
        // validasi input
        $data = $request->validated();

        // menggunakan service dari data validasi
        $user = $this->userService->createUser($data);

        // kembalikan hasil json dengan UserResource
        return (new UserResource($user))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): UserResource
    {
        // cari users menggunakan service
        $user = $this->userService->findUserById($id);

        // jika users tidak ditemukan buat pesan error
        if (!$user) {
            throw new HttpResponseException(response()->json([
                'errors' => [
                    'message' => 'User not found.'
                ]
            ], 404));
        }

        // kembalikan data pengguna dalam UserResource
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id, UserUpdateRequest $request): UserResource
    {
        // cari users berdasarkan id menggunakan service
        $user = $this->userService->findUserById($id);

        // jika users tidak ditemukan buat pesan error
        if (!$user) {
            return response()->json(['errors' => ['message' => 'User not found.']], 404);
        }

        // Update the user with validated data from the request
        $updatedUser = $this->userService->updateUser($id, $request->validated());

        // kembalikan data pengguna dalam UserResource
        return new UserResource($updatedUser);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): JsonResponse
    {
        // cari users berdasarkan id menggunakan service
        $user = $this->userService->findUserById($id);

        // jika users tidak ditemukan buat pesan error
        if (!$user) {
            throw new HttpResponseException(response()->json([
                'errors' => [
                    'message' => 'User not found.'
                ]
            ], 404));
        }

        // Hapus pengguna menggunakan service
        $this->userService->deleteUser($id);

        // Kembalikan respons JSON dengan data true dan status kode 200
        return response()->json([
            'data' => true
        ])->setStatusCode(200);
    }
}
