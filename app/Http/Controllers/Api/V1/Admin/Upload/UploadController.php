<?php

namespace App\Http\Controllers\Api\V1\Admin\Upload;

use App\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use App\Http\Requests\Upload\StoreUploadRequest;
use Illuminate\Support\Facades\DB;
use Image;

class UploadController extends Controller
{
    //

    public function index(StoreUploadRequest $request)
    {
        DB::beginTransaction();

        try {

            $file       = $request->file('file');
            $ext        = $request->file('file')->getClientOriginalExtension();
            $fileName   = time().'-'.md5($request->file('file')->getClientOriginalName()).'.'.$ext;
            $path       = uploadFileToSpaces($fileName, $file);

            if(!$path)
            {
                throw new \Exception("Something when wrong. File could not be uploaded.");
            }

            $upload = Upload::create(['url' => $path]);

            DB::commit();

            return ApiResponse::withSuccessData($upload);

        } catch (\Exception $e) {

            DB::rollback();
            return ApiResponse::withError('Something went wrong. Could not connect!', $e->getMessage());

        }
    }


}
