<?php

namespace App\Services\Offer;

use Illuminate\Http\Request;
use App\Repositories\Offer\OfferRepository;

class OfferGetter
{
    protected $offerRepository;

    public function __construct(OfferRepository $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }

    public function index(Request $request)
    {
        return $this->offerRepository->index($request);
    }
}
