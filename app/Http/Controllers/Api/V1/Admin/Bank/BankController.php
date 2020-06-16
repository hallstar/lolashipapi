<?php

namespace App\Http\Controllers\Api\V1\Admin\Bank;

use App\Http\Requests\Admin\Bank\StoreBankRequest;
use App\Http\Requests\Admin\Bank\UpdateBankRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Facades\ApiResponse;
use App\Models\Bank;

class BankController extends Controller
{
    public function index(Bank $bank, Request $request)
    {
        $query = $bank->newQuery();

        if($request->input('all', false)) {
            $banks = $query->with('branches')->orderBy('name', 'ASC')->get();
        } else {
            $banks = $query->orderBy('created_at', 'DESC')->paginate(20);
        }

        return ApiResponse::withSuccessData($banks);
    }

    public function store(StoreBankRequest $request)
    {
        DB::beginTransaction();

        try {

            $bank = Bank::create([
                'name' => $request->input('name'),
            ]);

            DB::commit();

            return ApiResponse::withSuccessData($bank);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function show($id)
    {
        try {

            $bank = Bank::findOrFail($id);

            return ApiResponse::withSuccessData($bank->load('branches'));

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function update($id, UpdateBankRequest $request)
    {
        DB::beginTransaction();

        try {

            $bank = Bank::findOrFail($id);

            $bank->update([
                'name' => $request->input('name'),
            ]);

            DB::commit();

            return ApiResponse::withSuccessData($bank);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $bank = Bank::findOrFail($id);

            $bank->delete();

            DB::commit();

            return ApiResponse::withSuccess("Deleted successfully.");

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }
}
