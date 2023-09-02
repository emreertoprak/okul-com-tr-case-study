<?php

namespace App\Services\Offer;

use Illuminate\Http\Request;
use App\Repositories\Offer\OfferRepository;
use App\Notifications\SendOfferApprovalNotification;
use App\Exceptions\Offer\OfferException;

class OfferUpdater
{
    protected $offerRepository;

    public function __construct(OfferRepository $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }

    public function updateById(Request $request,$id)
    {
        $data = $request->only('status');// we wanna update only status column
        $offer = $this->offerRepository->find($id);
        if ($offer) {
            $user = $offer->user;

            if (array_key_exists('status', $data) && $data['status'] === 'approved') {
                $user->notify(new SendOfferApprovalNotification($offer));
            }
        }
        else{
            throw new OfferException('Offer not found for that id');
        }
        return $this->offerRepository->update($id,$data);
    }
}
