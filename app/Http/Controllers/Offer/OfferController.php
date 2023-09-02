<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use App\Services\Offer\OfferCreator;
use App\Services\Offer\OfferGetter;
use Illuminate\Http\Request;
use App\Http\Resources\Offer\OfferResource;
use App\Http\Requests\Offer\OfferCreateRequest;
use App\Http\Requests\Offer\OfferUpdateRequest;
use App\Services\Offer\OfferUpdater;

class OfferController extends Controller
{
    protected $offerCreator;
    protected $offerGetter;
    protected $offerUpdater;

    public function __construct(OfferCreator $offerCreator,OfferGetter $offerGetter,OfferUpdater $offerUpdater)
    {
        $this->offerCreator = $offerCreator;
        $this->offerGetter = $offerGetter;
        $this->offerUpdater = $offerUpdater;
    }

    public function index(Request $request)
    {
        return OfferResource::collection($this->offerGetter->index($request));
    }

    public function store(OfferCreateRequest $request)
    {
        $createdOffer = OfferResource::make($this->offerCreator->store($request));

        return $this->successResponse($createdOffer, __('offer.created_success'));
    }

    public function updateById(OfferUpdateRequest $request,$id)
    {
        $updatedOffer = $this->offerUpdater->updateById($request, $id);

        return $this->successResponse($updatedOffer, __('offer.updated_success'));
    }
}
