<?php

namespace App\Services\User;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserCreator
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data["role_id"] = Role::USER_ROLES["user"];
        $this->validator($data)->validate();
        return $this->userRepository->store($data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'phone_number' => ['required', 'string', 'max:15','unique:users'],
            'date_of_birth' => ['nullable', 'date_format:Y-m-d','before_or_equal:' . now()->format('Y-m-d')],
        ]);
    }
}
