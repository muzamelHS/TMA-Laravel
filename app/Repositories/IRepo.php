<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface IRepo
{
    public function model(): object;

    public function all(): Collection;

    public function update(array $data, int $id): bool;

    public function findById(int $id): ?object;

    public function destroy(int $id): bool;
}
