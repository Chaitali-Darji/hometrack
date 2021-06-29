<?php
namespace App\Repositories\User;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
   public function all(): Collection;
}