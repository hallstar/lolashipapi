<?php

namespace App\Http\Controllers\Api\V1\Admin\Broker;

use App\Http\Requests\Admin\Broker\StoreBrokerRequest;
use App\Http\Requests\Admin\Broker\UpdateBrokerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Facades\ApiResponse;
use App\Models\Broker;

class BrokerController extends Controller
{
    public function index(Broker $broker, Request $request)
    {
        $query = $broker->newQuery();

        if($request->input('all', false)) {
            $brokers = $query->orderBy('name', 'ASC')->get();
        } else {
            $brokers = $query->orderBy('created_at', 'DESC')->paginate(20);
        }

        return ApiResponse::withSuccessData($brokers);
    }

    public function store(StoreBrokerRequest $request)
    {
        DB::beginTransaction();

        try {

            $broker = Broker::create([
                'name'      => $request->input('name'),
                'code'      => $request->input('code'),
            ]);

            DB::commit();

            return ApiResponse::withSuccessData($broker);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function show($id)
    {
        try {

            $broker = Broker::findOrFail($id);

            return ApiResponse::withSuccessData($broker);

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function update($id, UpdateBrokerRequest $request)
    {
        DB::beginTransaction();

        try {

            $broker = Broker::findOrFail($id);

            $broker->update([
                'name'      => $request->input('name'),
                'code'      => $request->input('code'),
            ]);

            DB::commit();

            return ApiResponse::withSuccessData($broker);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $broker = Broker::findOrFail($id);

            $broker->delete();

            DB::commit();

            return ApiResponse::withSuccess("Deleted successfully.");

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }
}
