<?php 
namespace App\Repositories;

use Illuminate\Support\Collection;

interface ProfesorRepositoryInterface
{
    public function all(): Collection;

    public function cursorPaginate(int $recordsPerPage); 
}