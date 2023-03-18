<?php
namespace App\Traits;

trait FileTrait
{

    public function uploadFile($request_file,$path)
    {

        $fileName = time().'.'.$request_file->getClientoriginalName();
        $request_file->move(public_path('uploads/'.$path), $fileName);

        return $fileName;

    }
}

?>
