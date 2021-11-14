<?php
namespace App\Repositories\Eloquent;

use App\Models\AlumnoGrado;
use Illuminate\Support\Collection;
use App\Repositories\AlumnoGradoRepositoryInterface;

class AlumnoGradoRepository extends BaseRepository implements AlumnoGradoRepositoryInterface
{
    public function __construct(AlumnoGrado $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function cursorPaginate(int $recordsPerPage)
    {
        return $this->model->with(['alumno', 'grado.profesor'])->orderByDesc('id')->cursorPaginate($recordsPerPage);
    }
}