<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class UserRepository extends Repository
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function index(Request $request)
    {
        $query = $this->model->newQuery();
        return $query->get();
    }
}
