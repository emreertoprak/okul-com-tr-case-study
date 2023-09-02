<?php

namespace App\Services\School;

use Illuminate\Http\Request;
use App\Repositories\School\SchoolRepository;

class SchoolCreator
{
    protected $schoolRepository;

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        return $this->schoolRepository->store($data);
    }
}
