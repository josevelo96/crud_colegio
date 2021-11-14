<?php
namespace App\Repositories\Eloquent;

use App\Models\Grado;
use Illuminate\Support\Collection;
use App\Repositories\GradoRepositoryInterface;

class GradoRepository extends BaseRepository implements GradoRepositoryInterface
{
    public function __construct(Grado $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function cursorPaginate(int $recordsPerPage)
    {
        return $this->model->with('profesor')->orderByDesc('id')->cursorPaginate($recordsPerPage);
    }
}