<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function create(array $data);
    public function find($id);
    public function search(array $filters, $page, $size);
    public function delete($id);
    public function update($id, array $data);
}
