<?php 
namespace App\Repositories;

use Illuminate\Support\Collection;

interface GradoRepositoryInterface
{
    public function all(): Collection;

    public function cursorPaginate(int $recordsPerPage);
}