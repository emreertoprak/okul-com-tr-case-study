<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Services\School\SchoolCreator;
use App\Services\School\SchoolGetter;
use Illuminate\Http\Request;
use App\Http\Resources\School\SchoolResource;
use App\Http\Requests\School\SchoolCreateRequest;

class SchoolController extends Controller
{
    protected $schoolCreator;
    protected $schoolGetter;

    public function __construct(SchoolCreator $schoolCreator,SchoolGetter $schoolGetter)
    {
        $this->schoolCreator = $schoolCreator;
        $this->schoolGetter = $schoolGetter;
    }

    public function index(Request $request)
    {
        return SchoolResource::collection($this->schoolGetter->index($request));
    }

    public function store(SchoolCreateRequest $request)
    {
        $createdSchool = SchoolResource::make($this->schoolCreator->store($request));

        return $this->successResponse($createdSchool, __('school.created_success'));

    }
}
