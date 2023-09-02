<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\UserCreator;
use App\Services\User\UserGetter;
use Illuminate\Http\Request;
use App\Http\Resources\User\UserResource;

class UserController extends Controller
{
    protected $userCreator;
    protected $userGetter;

    public function __construct(UserCreator $userCreator,UserGetter $userGetter)
    {
        $this->userCreator = $userCreator;
        $this->userGetter = $userGetter;
    }

    public function index(Request $request)
    {
        return UserResource::collection($this->userGetter->index($request));
    }

    public function store(Request $request)
    {
        $createdUser = UserResource::make($this->userCreator->store($request));

        return $this->successResponse($createdUser, __('user.created_success'));

    }
}
