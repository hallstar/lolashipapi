<?php

namespace App\Http\Controllers\Api\V1\Application;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Constants\ApplicationEntryType;
use App\Constants\ApplicationStatus;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    //
    public function index(Application $application, Request $request)
    {
        $user = auth()->user();
        $limit = $request->input("limit", 20);
        $query = $application->newQuery();

        $query->where('user_id', $user->id)
            ->where('entry_type', ApplicationEntryType::ONLINE)
            ->orderBy('created_at', 'DESC');

        return ApiResponse::withSuccessData($query->with([
            'broker',
            'detail',
            'directors',
            'joint_accounts',
            'offer',
            'payment',
            'refund',
            'user',
        ])->paginate($limit));
    }

    public function show($id)
    {
        try
        {
            $user = auth()->user();

            $application = Application::where('id', $id)
                ->where('user_id', $user->id)
                ->with([
                    'broker',
                    'detail',
                    'directors',
                    'joint_accounts',
                    'offer',
                    'payment',
                    'refund',
                    'user',
                ])
                ->firstOrFail();

            return ApiResponse::withSuccessData($application);

        } catch (\Exception $e) {

            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try
        {
            $user = auth()->user();

            $application = Application::where('id', $id)
                ->where('user_id', $user->id)
                ->whereIn('status', [ApplicationStatus::DRAFT, ApplicationStatus::REJECTED])
                ->firstOrFail();

            $application->delete();

            DB::commit();

            return ApiResponse::withSuccess('Deleted successfully.');

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }
}
