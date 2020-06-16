<?php

namespace App\Http\Controllers\Api\V1\Offer;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    //

    public function index(Offer $offer, Request $request)
    {
        $query  = $offer->newQuery();

        $limit  = $request->input("limit", 20);
        $search = $request->input("q", null);
        $order  = $request->input("order_by", 'closing_date');

        if($search)
        {
           $query->where(function($q) use($search){
                $q->where('description', 'LIKE', '%'.$search.'%')
                  ->orWhere('title', 'LIKE', '%'.$search.'%');
           });
        }

        if($order === 'opening_date')
        {    
            $query->orderBy('opening_date', 'ASC');
        }
        else
        {
            $query->orderBy('closing_date', 'DESC'); 
        }
        
        $query->where('published', true);

        $results = $query->with([
            'broker',
            'currency',
            'fees',
        ])->paginate($limit);

        return ApiResponse::withSuccessData($results);
    }

    public function show($id)
    {
        try {

            $offer = Offer::findOrFail($id);

            return ApiResponse::withSuccessData($offer->load(['broker', 'currency', 'fees']));

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }
}
