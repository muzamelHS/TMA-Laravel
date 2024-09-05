<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

abstract class BaseRepo implements IRepo
{
    /**
     * BaseRepo constructor.
     */
    public function __construct(
        protected $model
    ) {
        $this->model = new $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function create(array $data): object
    {
        return $this->model->create($data);
    }

    public function edit(int $id): object
    {
        return $this->model->where('id', $id);
    }

    public function findById(int $id): ?object
    {
        return $this->model->find($id);
    }

    public function update(array $data, int $id): bool
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function destroy(int $id): bool
    {
        return $this->model->where('id', $id)->delete();
    }

    public function model(): object
    {
        return $this->model;
    }
}
