<?php

namespace App\Http\Controllers\Api\V1\Admin\Offer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use App\Facades\ApiResponse;
use App\Models\Offer;
use App\Http\Requests\Admin\Offer\StoreOfferRequest;
use App\Http\Requests\Admin\Offer\UpdateOfferRequest;
use App\Constants\MarketType;

class OfferController extends Controller
{

    public function index(Offer $offer, Request $request)
    {
        $query = $offer->newQuery();
        return ApiResponse::withSuccessData($query->with([
            'broker',
            'currency',
            'fees',
            'galleries',
        ])->orderBy('created_at', 'DESC')->paginate(20));
    }

    public function show($id)
    {
        try {

            $offer = Offer::findOrFail($id);
            return ApiResponse::withSuccessData($offer->load(['broker', 'currency', 'fees', 'galleries']));

        } catch (\Exception $e) {
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());
        }
    }

    public function store(StoreOfferRequest $request)
    {
        DB::beginTransaction();

        try {

            $inputs = [
                'title'                 => $request->input('title'),
                'short_name'            => $request->input('short_name'),
                'prefix'                => $request->input('prefix'),
                'description'           => $request->input('description'),
                'broker_id'             => $request->input('broker_id'),
                'currency_id'           => $request->input('currency_id'),
                'market_type'           => MarketType::PRIVATE,
                'type'                  => $request->input('type'),
                'status'                => $request->input('status'),
                'opening_date'          => $request->input('opening_date'),
                'closing_date'          => $request->input('closing_date'),
                'published'             => $request->input('published', false),
                'unit_price'            => $request->input('unit_price'),
                'available'             => $request->input('available'),
                'minimum'               => $request->input('minimum'),
                'maximum'               => $request->input('maximum'),
                'increment_size'        => $request->input('increment_size'),
            ];

            if($logo = setUpload($request->input('logo_upload_id'))) {
                $inputs['logo'] = $logo;
            }

            $offer = Offer::create($inputs);

            // Store fees
            $fees = $request->get('fees');

            if(!empty($fees)) {
                $offer->fees()->createMany($fees);
            }

            // Store galleries
            $galleries = $request->get('galleries');

            if(!empty($galleries)) {

                $data = [];

                foreach($galleries as $gallery) {

                    if($upload = setUpload($gallery['upload_id'])) {
                        $data[] = [
                            'url'  => $upload
                        ];
                    }
                }

                $offer->galleries()->createMany($data);
            }

            DB::commit();

            return ApiResponse::withSuccessData($offer);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function update($id, UpdateOfferRequest $request)
    {
        DB::beginTransaction();

        try {

            $offer = Offer::findOrFail($id);

            $inputs = [
                'title'                 => $request->input('title'),
                'short_name'            => $request->input('short_name'),
                'prefix'                => $request->input('prefix'),
                'description'           => $request->input('description'),
                'broker_id'             => $request->input('broker_id'),
                'currency_id'           => $request->input('currency_id'),
                'market_type'           => MarketType::PRIVATE,
                'type'                  => $request->input('type'),
                'status'                => $request->input('status'),
                'opening_date'          => $request->input('opening_date'),
                'closing_date'          => $request->input('closing_date'),
                'published'             => $request->input('published', false),
                'unit_price'            => $request->input('unit_price'),
                'available'             => $request->input('available'),
                'minimum'               => $request->input('minimum'),
                'maximum'               => $request->input('maximum'),
                'increment_size'        => $request->input('increment_size'),
            ];

            if($logo = setUpload($request->input('logo_upload_id', null))) {
                $inputs['logo'] = $logo;
            }

            $offer->update($inputs);

            // Store fees
            $offer->fees()->delete();
            $fees = $request->get('fees');

            if(!empty($fees)) {
                $offer->fees()->createMany($fees);
            }

            DB::commit();

            return ApiResponse::withSuccessData($offer);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

}
