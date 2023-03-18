<?php

namespace App\Repository;

use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Facades\Valdiator;
use App\Traits\FileTrait;
use App\Models\User;


class UserRepository implements  UserRepositoryInterface
{
    use FileTrait;

    public function insertUser($request)
    {
        try{


            $type = $request->header('type');
            $data = $request->except('_token');
            $located = $request->only('address', 'date_birth');

                if($request->has('image') && $request->hasFile('image'))
                {
                    $image = $this->uploadFile($request->image,'/users');
                }
                if($type == 'second'){

                    $data['data'] = [
                        'image' => time().'.'.$request->image->getClientoriginalName(),
                        'title' => $request->image->getClientoriginalName(),
                    ];
                }

                $type == 'third' ? $data['data'] = json_encode($located) : '';




        $user = User::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Created Successfully',
            'data' => $user
        ]);

    }catch(\Exception $ex)
        {
    return $ex;
            return response()->json([
                'status' => 'faild',
                'message' => 'Data Not Inserted',
                'data' => $ex
            ]);

        }


    }
}

?>
