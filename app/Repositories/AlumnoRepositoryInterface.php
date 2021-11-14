<?php 
namespace App\Repositories;

use Illuminate\Support\Collection;

interface AlumnoRepositoryInterface
{
    public function all(): Collection;

    public function cursorPaginate(int $recorsPerPage);
}