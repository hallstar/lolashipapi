<?php

namespace App\Http\Controllers\Api\V1\Upload;

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

            if(!auth()->guard("api")->check() && !hasUploadKey($request->input("upload_key")))
            {
                throw new \Exception("This action is unauthorized.");
            }
            
            $file       = $request->file('file');
            $mediaType  = $request->input('media_type', null);
            $ext        = $request->file('file')->getClientOriginalExtension();
            $fileName   = time().'-'.md5($request->file('file')->getClientOriginalName()).'.'.$ext;
            
            if($mediaType==='signature' && in_array($file->getMimeType(), ["image/jpeg", "image/jpg", "image/png", "image/webp"]))
            {
                $image  = Image::make($file)->resize(290, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('jpg', 70);
                
                $file   = $image->stream()->detach();
            }

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
