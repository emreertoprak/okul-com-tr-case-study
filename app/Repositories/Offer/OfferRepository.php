<?php

namespace App\Repositories\Offer;

use App\Models\Offer;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class OfferRepository extends Repository
{
    public function __construct(Offer $model)
    {
        parent::__construct($model);
    }

    public function index(Request $request)
    {
        $query = $this->model->newQuery();
        $searchParams = $request->all();
        $userId = Arr::get($searchParams, 'user_id', '');
        $status = Arr::get($searchParams, 'status', 'pending');

        if($userId) {
            $query->where('user_id', $userId);
        }

        if($status) {
            $query->where('status', $status);
        }

        return $query->get();
    }
}
