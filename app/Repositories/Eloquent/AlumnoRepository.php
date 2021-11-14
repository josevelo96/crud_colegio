<?php
namespace App\Repositories\Eloquent;

use App\Repositories\AlumnoRepositoryInterface;
use Illuminate\Support\Collection;
use App\Models\Alumno;

class AlumnoRepository extends BaseRepository implements AlumnoRepositoryInterface
{
    public function __construct(Alumno $model)
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