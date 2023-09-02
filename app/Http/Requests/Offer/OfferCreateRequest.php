<?php

namespace App\Http\Requests\Offer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Rules\UniqueSchoolRequest;

class OfferCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [
            'school_id' => ['required', 'exists:App\Models\School,id', new UniqueSchoolRequest],
        ];
        return $rules;
    }
}
