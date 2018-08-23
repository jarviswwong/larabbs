<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function show(User $user)
    {
        return view("users.show", compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.show', $user->id)->with('success', '个人信息更新成功！');
    }

    public function avatar_edit(Request $request, ImageUploadHandler $imageUploadHandler, User $user)
    {

//        dd($request->all());
        $data = $request->all();
        if ($request->has('avatar')) {
            $result = $imageUploadHandler->storeImage($request->avatar, 'avatars', $user->id, $request->extension, 362);

            if ($result) {
                $data['avatar'] = $result['img_url'];

                if ($user->update($data)) {

                    return response()->json([
                        "status" => 1,
                        "msg" => "头像上传成功！",
                        "avatar_path" => $result['img_url']
                    ]);
                }
            }
        }


    }
}
