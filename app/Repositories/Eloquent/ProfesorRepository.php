<?php
namespace App\Repositories\Eloquent;

use App\Models\Profesor;
use Illuminate\Support\Collection;
use App\Repositories\ProfesorRepositoryInterface;

class ProfesorRepository extends BaseRepository implements ProfesorRepositoryInterface
{
    public function __construct(Profesor $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function cursorPaginate(int $recordsPerPage)
    {
        return $this->model->orderByDesc('id')->cursorPaginate($recordsPerPage);
    }
}