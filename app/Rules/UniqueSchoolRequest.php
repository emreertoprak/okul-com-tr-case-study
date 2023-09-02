<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UniqueSchoolRequest implements Rule
{
    public function passes($attribute, $value)
    {
        $user = auth()->user();
        $schoolId = $value;

        $last24Hours = Carbon::now()->subHours(24);

        $existingRequest = DB::table('offers')
            ->where('user_id', $user->id)
            ->where('school_id', $schoolId)
            ->where('created_at', '>=', $last24Hours)
            ->first();

        return !$existingRequest;
    }

    public function message()
    {
        return 'You have already requested this school within the last 24 hours.';
    }
}
