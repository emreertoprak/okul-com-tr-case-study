<?php

namespace App\Repositories\School;

use App\Models\School;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class SchoolRepository extends Repository
{

    public function __construct(School $model)
    {
        parent::__construct($model);
    }

    public function index(Request $request)
    {
        $query = $this->model->newQuery();
        return $query->get();
    }
}
