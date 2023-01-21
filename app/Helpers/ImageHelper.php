<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;



class ImageHelper
{

    public static function handleUploadedImage($file, $path, $delete = null){
        if ($file) {
            // Delete Image Which Exists In Directory
            if ($delete){
                if (file_exists($delete)) {
                    unlink($delete);
                }
            }

            $name = time() .'gallery'. '.'.$file->getClientOriginalExtension();
            $galeryImg = Image::make($file)->resize(800, 800);
            $photo_save_path = public_path($path) ."/".$name;
            $galeryImg->save($photo_save_path);
            return $path . "/" . $name;

        }
    }
    public static function handleUploadedBannerImage($file, $path, $delete = null){
        if ($file) {
            // Delete Image Which Exists In Directory
            if ($delete){
                if (file_exists($delete)) {
                    unlink($delete);
                }
            }

            $name = time() .'banner'. '.'.$file->getClientOriginalExtension();
            $galeryImg = Image::make($file)->resize(450, 490);
            $photo_save_path = public_path($path) ."/".$name;
            $galeryImg->save($photo_save_path);
            return $path . "/" . $name;

        }
    }
    // Majorly Slider Image Starts:::::::::::::::::::::::::::::::::::::::::::::::::::::
    public static function handleSliderUploadedImage($file, $path, $delete = null){
        if ($file) {
            // Delete Image Which Exists In Directory
            if ($delete){
                if (file_exists($delete)) {
                    unlink($delete);
                }
            }
    
            // $name = time() .'-gallery'. '.'.$file->getClientOriginalExtension();
            // $file->move(public_path($path), $name);
            // return $path . "/" . $name;

            $name = 'slider_'.time().'.'.$file->getClientOriginalExtension();
            $SliderImg = Image::make($file)->resize(1920, 800);
            $photo_save_path = public_path($path) ."/".$name;
            $SliderImg->save($photo_save_path);
            return $path . "/" . $name;

        }
    }


    public static function handleSliderUpdatedUploadImage($file, $path, $data, $field){
        // $name = time() . '-.' . $file->getClientOriginalExtension();

        // $file->move(public_path($path), $name);
        $name = 'slider_'.time().'.'.$file->getClientOriginalExtension();
        $SliderImg = Image::make($file)->resize(1920, 800);
        $photo_save_path = public_path($path) ."/".$name;
        $SliderImg->save($photo_save_path);
        return $path . "/" . $name;

        if ($data[$field] != null) {
            if (file_exists($data[$field])) {
                unlink($data[$field]);
            }
        }

        return $path . '/' . $name;
    }
  // Majorly Slider Image Ends:::::::::::::::::::::::::::::::::::::::::::::::::::::
    public static function itemHandleUploadedimage($file, $path, $delete = null){
        if ($file) {
            // Delete Image Which Exists In Directory
            if ($delete){
                if (file_exists($delete)) {
                    unlink($delete);
                }
            }

            if (!file_exists($path . '/' . 'thumbnails')) {
                mkdir(public_path($path . '/' . 'thumbnails'), 0777, true);
            }
        
            $thumb = time() . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file)->resize(230, 230);
            $thumb_save_path = public_path($path) . "/thumbnails" . "/" . $thumb;
            $image->save($thumb_save_path);

            // $photo = time() . '-' . $file->getClientOriginalName();
            // $file->move(public_path($path), $photo);
            $photo = time() . '.' . $file->getClientOriginalExtension();
            $cateImg = Image::make($file)->resize(360, 360);
            $photo_save_path = public_path($path) . "/". $photo;
            $cateImg->save($photo_save_path);

            return [
                $path. '/' . $photo,
                $path . '/thumbnails' . '/' . $thumb
            ];
        }
    }
    public static function itemHandleFlashDealUploadedimage($file, $path, $delete = null){
        if ($file) {
            // Delete Image Which Exists In Directory
            if($delete){
                if (file_exists($delete)) {
                    unlink($delete);
                }
            }
           
            $name = time() .'-flashdeal'. '.'.$file->getClientOriginalExtension();
            $galeryImg = Image::make($file)->resize(1305, 620);
            $photo_save_path = public_path($path) ."/".$name;
            $galeryImg->save($photo_save_path);
            return $path . "/" . $name;
        }
    }

    public static function handleUpdatedUploadedImage($file, $path, $data, $field){
        $name = time() . '-.' . $file->getClientOriginalExtension();

        $file->move(public_path($path), $name);

        if ($data[$field] != null) {
            if (file_exists($data[$field])) {
                unlink($data[$field]);
            }
        }

        return $path . '/' . $name;
    }

    //  <------------- HANDLE CATEGORY IMAGE UPLOADS --------------------->
    public static function handleUpdatedUploadedCategoryImage($file, $path, $data, $field){

        $thumb = time() .'.'.$file->getClientOriginalExtension();
        $image = Image::make($file)->resize(150, 150);
        $thumb_save_path = public_path($path) . "/thumbnails" . "/" . $thumb;
        $image->save($thumb_save_path);

        // $photo = time() .'.'. $file->getClientOriginalExtension();
        // $file->move(public_path($path), $photo);
        $photo = time() . '.' . $file->getClientOriginalExtension();
        $prodImg = Image::make($file)->resize(1920, 800);
        $photo_save_path = public_path($path) . "/". $photo;
        $prodImg->save($photo_save_path);

        if($data['thumbnail']){
            if(file_exists($data['thumbnail'])){
                unlink($data['thumbnail']);
            }
        }

        if($data[$field] != null){
            if(file_exists($data[$field])){
                unlink($data[$field]);
            }
        }

        return [
            $path. '/' . $photo,
            $path . '/thumbnails' . '/' . $thumb
        ];
    }

    public static function categoryImageUpload($file, $path, $delete = null){
      
        if ($file) {
            // Delete Image Which Exists In Directory
            if ($delete){
                if (file_exists($delete)) {
                    unlink($delete);
                }
            }

            $name = 'catimg'.time().'.'.$file->getClientOriginalExtension();
            $catImg = Image::make($file)->resize(1050, 486);
            $photo_save_path = public_path($path) ."/".$name;
            $catImg->save($photo_save_path);
            return $path . "/" . $name;

        }
    }
    // Cateory Thumbnail
    public static function categoryThumbUpload($file, $path, $delete = null){
      
        if ($file) {
            // Delete Image Which Exists In Directory
            if ($delete){
                if (file_exists($delete)) {
                    unlink($delete);
                }
            }

            $name = 'cat_thumb'.time().'.'.$file->getClientOriginalExtension();
            $thumb = Image::make($file)->resize(150, 150);
            $photo_save_path = public_path($path) ."/".$name;
            $thumb->save($photo_save_path);
            return $path . "/" . $name;

        }
    }

    public static function itemHandleUpdatedUploadedImage($file, $path, $data, $field)
    {
        $thumb = time() .'.'.$file->getClientOriginalExtension();
        $image = Image::make($file)->resize(230, 230);
        $thumb_save_path = public_path($path) . "/thumbnails" . "/" . $thumb;
        $image->save($thumb_save_path);

        $photo = time() .'.'. $file->getClientOriginalExtension();
        $file->move(public_path($path), $photo);

        if($data['thumbnail']){
            if(file_exists($data['thumbnail'])){
                unlink($data['thumbnail']);
            }
        }

        if($data[$field] != null){
            if(file_exists($data[$field])){
                unlink($data[$field]);
            }
        }

        return [
            $path. '/' . $photo,
            $path . '/thumbnails' . '/' . $thumb
        ];
    }

    public static function handleDeletedImage($data, $field)
    {
        if($data[$field] != null){
            if(file_exists($data[$field])){
                unlink($data[$field]);
            }
        }
    }

}
