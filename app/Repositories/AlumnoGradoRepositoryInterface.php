<?php 
namespace App\Repositories;

use Illuminate\Support\Collection;

interface AlumnoGradoRepositoryInterface
{
    public function all(): Collection;

    public function cursorPaginate(int $recordsPerPage);
}