<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data)
    {
        return User::create($data); // Menggunakan Eloquent untuk menyimpan data
    }

    public function find($id)
    {
        return User::find($id); // Menggunakan Eloquent untuk mencari data berdasarkan ID
    }

    public function search(array $filters, $page, $size)
    {
        return User::where(function (Builder $builder) use ($filters) {
            if (!empty($filters['name'])) {
                $builder->where('name', 'like', '%' . $filters['name'] . '%');
            }

            if (!empty($filters['age'])) {
                $builder->where('age', 'like', '%' . $filters['age'] . '%');
            }

            if (!empty($filters['job_title'])) {
                $builder->where('job_title', 'like', '%' . $filters['job_title'] . '%');
            }

            if (!empty($filters['company'])) {
                $builder->where('company', 'like', '%' . $filters['company'] . '%');
            }
        })->paginate(perPage: $size, page: $page);
    }

    public function delete($id)
    {
        return User::destroy($id); // Use Eloquent's destroy method
    }

    public function update($id, array $data)
    {
        $user = User::where('id', $id)->first(); // Fetch user by ID
        $user->fill($data); // Fill only the fields provided
        $user->save(); // Save changes
        return $user; // Return the updated user
    }
}
