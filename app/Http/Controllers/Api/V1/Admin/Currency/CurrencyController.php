<?php

namespace App\Http\Controllers\Api\V1\Admin\Currency;

use App\Http\Requests\Admin\Currency\StoreCurrencyRequest;
use App\Http\Requests\Admin\Currency\UpdateCurrencyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Facades\ApiResponse;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function index(Currency $currency, Request $request)
    {
        $query = $currency->newQuery();

        if($request->input('all', false)) {
            $currencies = $query->orderBy('name', 'ASC')->get();
        } else {
            $currencies = $query->orderBy('created_at', 'DESC')->paginate(20);
        }

        return ApiResponse::withSuccessData($currencies);
    }

    public function store(StoreCurrencyRequest $request)
    {
        DB::beginTransaction();

        try {

            $currency = Currency::create([
                'name'      => $request->input('name'),
                'code'      => $request->input('code'),
                'symbol'    => $request->input('symbol'),
                'precision' => $request->input('precision'),
                'template'  => $request->input('template', null),
            ]);

            DB::commit();

            return ApiResponse::withSuccessData($currency);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function show($id)
    {
        try {

            $currency = Currency::findOrFail($id);

            return ApiResponse::withSuccessData($currency);

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function update($id, UpdateCurrencyRequest $request)
    {
        DB::beginTransaction();

        try {

            $currency = Currency::findOrFail($id);

            $currency->update([
                'name'      => $request->input('name'),
                'code'      => $request->input('code'),
                'symbol'    => $request->input('symbol'),
                'precision' => $request->input('precision'),
                'template'  => $request->input('template', null),
            ]);

            DB::commit();

            return ApiResponse::withSuccessData($currency);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $currency = Currency::findOrFail($id);

            $currency->delete();

            DB::commit();

            return ApiResponse::withSuccess("Deleted successfully.");

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }
}
