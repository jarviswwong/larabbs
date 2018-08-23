<?php

namespace App\Handlers;

use Faker\Provider\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class ImageUploadHandler
{

    protected $allowed_ext = ["png", "jpg", "gif", "jpeg"];

    //存储上传的图片
    public function storeImage($image, $folder, $file_prefix, $extension, $max_width = false)
    {

//        if (!imagecreatefromstring($blob)) {
//            return false;
//        }
        $folder_name = "uploads/images/$folder/" . date("Ym/d", time());

        $direct_path = public_path() . "/" . $folder_name;

        $file_name = $file_prefix . "_" . str_random(5) . "_" . time() . $extension;
        $image = substr($image, strpos($image, ",") + 1);
        $data = base64_decode($image);

        //保证文件夹存在
        if (!file_exists($direct_path)) {
            mkdir($direct_path, 0777, true);
        }

        $result = file_put_contents($direct_path . "/" . $file_name, $data);

        if ($result) {
            if ($max_width && $extension != "gif") {
                $this->reduceSize($direct_path . "/" . $file_name, $max_width);
            }

            return [
                "img_url" => config('app.url') . "/$folder_name/$file_name"
            ];
        }

    }

    //后端对图片进行处理
    public function reduceSize($file_path, $max_width)
    {
        //实例化图片
        $image = Image::make($file_path);
        // 进行大小调整的操作
        $image->resize($max_width, null, function ($constraint) {

            // 设定宽度是 $max_width，高度等比例双方缩放
            $constraint->aspectRatio();

            // 防止裁图时图片尺寸变大
            $constraint->upsize();
        });

        // 对图片修改后进行保存
        $image->save();
    }
}