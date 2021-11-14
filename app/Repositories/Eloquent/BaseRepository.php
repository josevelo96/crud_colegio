<?php
namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\EloquentRepositoryInterface;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function create($attributes): Model
    {
        return $this->model->create($attributes);
    }

    public function update(Model $model, $attributes)
    {
        return $model->update($attributes);
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }
}