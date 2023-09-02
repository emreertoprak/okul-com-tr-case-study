<?php

namespace App\Services\School;

use Illuminate\Http\Request;
use App\Repositories\School\SchoolRepository;

class SchoolGetter
{
    protected $schoolRepository;

    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }

    public function index(Request $request)
    {
        return $this->schoolRepository->index($request);
    }
}
