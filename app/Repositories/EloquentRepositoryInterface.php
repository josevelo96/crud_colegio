<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    public function find($id): ?Model;

    public function create(array $attributes): Model;

    public function update(Model $model, array $attributes);

    public function delete(Model $model);
}