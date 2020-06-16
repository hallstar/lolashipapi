<?php

namespace App\Http\Controllers\Api\V1\Admin\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Facades\ApiResponse;
use App\Models\OfferGallery;
use App\Models\Offer;

class GalleryController extends Controller
{

    public function store($offerId, $uploadId)
    {
        DB::beginTransaction();

        try {

            $offer = Offer::findOrFail($offerId);

            if($upload = setUpload($uploadId)) {
                $offer->galleries()->create(['url'  => $upload]);
            }

            DB::commit();

            return ApiResponse::withSuccessData($offer->load(['broker', 'currency', 'fees', 'galleries']));

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function delete($offerId, $galleryId)
    {
        DB::beginTransaction();

        try {

            $gallery = OfferGallery::where('id', $galleryId)->where('offer_id', $offerId)->firstOrFail();
            $gallery->delete();

            DB::commit();

            return ApiResponse::withSuccess('Deleted successfully.');

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

}
