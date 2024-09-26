<?php

namespace App\Services;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser($data)
    {
        // Tambahkan logika bisnis atau validasi lain jika diperlukan
        return $this->userRepository->create($data);
    }

    public function findUserById($id)
    {
        // Cari pengguna berdasarkan id menggunakan UserRepository
        $user = $this->userRepository->find($id);

        // Jika pengguna tidak ditemukan, tampilkan pesan "User not found" dan status kode 404
        if (!$user) {
            throw new HttpResponseException(response()->json([
                'errors' => [
                    'message' => 'User not found.'
                ]
            ], 404));
        }

        return $user;
    }

    public function searchUsers(array $filters, $page = 1, $size = 10)
    {
        // call method UserRepository untuk menghapus data berdasar filter, pagination, size
        return $this->userRepository->search($filters, $page, $size);
    }

    public function deleteUser($id)
    {
        // call method UserRepository untuk menghapus data berdasar id
        return $this->userRepository->delete($id);
    }

    public function updateUser($id, array $data)
    {
        // call method UserRepository untuk update data berdasar id, data baru
        return $this->userRepository->update($id, $data);
    }
}
