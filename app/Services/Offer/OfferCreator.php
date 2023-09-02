<?php

namespace App\Services\Offer;

use Illuminate\Http\Request;
use App\Repositories\Offer\OfferRepository;
use App\Http\Requests\Offer\OfferCreateRequest;

class OfferCreator
{
    protected $offerRepository;

    public function __construct(OfferRepository $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }

    public function store(OfferCreateRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        return $this->offerRepository->store($data);
    }
}
