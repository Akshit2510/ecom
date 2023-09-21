<?php

namespace App\Http\Traits;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait FileUploadTrait
{
     /**
     * File upload trait used in controllers to upload files
     */
    public function saveFiles($file,$model_id,$fileType)
    {
        ini_set('memory_limit', '-1');
        if (!file_exists(public_path('storage/uploads'))) {
            mkdir(public_path('storage/uploads'), 0777);
        }
        if ($file) {
            $extension = Arr::last(explode('.',$file->getClientOriginalName()));
            $name = Arr::first(explode('.',$file->getClientOriginalName()));
            $filename = time() . '-' . Str::slug($name).'.'.$extension;
            $file->move(public_path('storage/uploads/'.$fileType.'/'), $filename);
            $media = Media::where([['file_type',$fileType],['model_id',$model_id]])->first();
            if (empty($media)) {
                $media = new Media();
                $media->model_id = $model_id;                
                $media->file_name = $filename;
                $media->file_type = $fileType;
                $media->file_ext = Str::lower($extension);
                $media->save();
            }
            else {
                File::delete(public_path('storage/uploads/'.$fileType.'/').$media->file_name);
                $media->update(['file_name' => $filename, 'file_ext' => Str::lower($extension)]);
            }
            return $media;
        }
    }
}