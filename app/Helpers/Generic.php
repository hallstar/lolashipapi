<?php

function normalizeDate($value)
{
    return \Carbon\Carbon::parse($value)->setTimezone(env('APP_TIMEZONE', 'America/Jamaica'))->format("M d, Y h:i a");
}

function mutate($number)
{
    return $number*1000;
}

function normalize($number)
{
    if($number==null || $number==0)
    {
        return $number;
    }

    return $number/1000;
}

function uploadFileToSpaces($filename, $file, $permission='private')
{
    $foler = 'uploads/'.date('Y').'/'.date('m').'/'.date('d').'/';

    if(env('APP_ENV') !== 'production')
    {
        $folder = 'kpreit/uploads/'.date('Y').'/'.date('m').'/'.date('d').'/';
    }

    $filePath   = $foler.$filename;
    $file       = is_resource($file) ? $file : file_get_contents($file);
    $p          = Storage::disk('spaces')->put($filePath, $file, $permission);

    return ((bool) $p ? $filePath : false);
}

function generatePresignedUrl($file_path)
{
    $url = \Storage::disk('spaces')->temporaryUrl(
        $file_path, \Carbon\Carbon::now()->addMinutes(30)
    );

    return $url;
}

function hasUploadKey($key)
{
    if($key==null)
    {
        return false;
    }

    $ukey = DB::table('upload_keys')->where('key', $key)->where('expires', '>', time())->first();

    if($ukey==null)
    {
        return false;
    }

    return true;
}

function setUpload($id)
{
    if($id==null)
    {
        return false;
    }

    $upload = DB::table('uploads')->where('id', $id)->first();

    if($upload)
    {
        DB::table('uploads')->where('id', $id)->delete();
        return $upload->url;
    }

    return false;

}

function generateReferenceNumber($offerId, $prefix, $suffix=null, $length = 8)
    {
        if(empty($suffix))
        {
            $suffix = strval(DB::table('applications')->where('offer_id', $offerId)->count());
        }

        $number = "{$prefix}{$suffix}";
        $numberLength = strlen($number);

        if($numberLength < $length)
        {
            $suf = str_pad($suffix, ($length-strlen($prefix)), "0", STR_PAD_LEFT);
            $number = "{$prefix}{$suf}";
        }

        // Check if number exists
        $app = DB::table('applications')->where('reference_number', $number)->first();

        if(empty($app))
        {
            return $number;
        }

        return $this->generateReferenceNumber($offerId, $prefix, $suffix+1, $length);
    }

    function generateRandomString($length = 8) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
?>
