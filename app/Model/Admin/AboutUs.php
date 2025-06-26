<?php

namespace App\Model\Admin;

use App\Model\BaseModel;
use App\Model\Common\File;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\FileHelper;
use App\Model\Admin\AboutUsGallery;

class AboutUs extends Model
{
    protected $table = 'about_us';
    protected $fillable = ['name', 'slug', 'description', 'content', 'mission', 'vision', 'core_values', 'raw_material_area'];

    public function image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'image');
    }

    public function mission_image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'mission_image');
    }

    public function vision_image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'vision_image');
    }

    public function core_values_image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'core_values_image');
    }

    public function raw_material_area_image()
    {
        return $this->morphOne(File::class, 'model')->where('custom_field', 'raw_material_area_image');
    }

    public function galleries()
    {
        return $this->hasMany(AboutUsGallery::class, 'about_us_id', 'id');
    }

    public static function searchByFilter($request)
    {
        $result = self::with([
            'image',
            'mission_image',
            'vision_image',
            'core_values_image',
            'raw_material_area_image',
            'galleries',
        ]);

        if (!empty($request->name)) {
            $result = $result->where('name', 'like', '%' . $request->name . '%');
        }

        $result = $result->orderBy('created_at', 'desc')->get();
        return $result;
    }

    public static function getDataForEdit($id)
    {
        return self::with([
            'image',
            'mission_image',
            'vision_image',
            'core_values_image',
            'raw_material_area_image',
            'galleries' => function ($q) {
                $q->select(['id', 'about_us_id', 'sort'])
                    ->with(['image'])
                    ->orderBy('sort', 'ASC');
            },
        ])->where('id', $id)
            ->firstOrFail();
    }

    public function canDelete()
    {
        return true;
    }

    public function syncGalleries($galleries)
    {
        if ($galleries) {
            $exist_ids = [];
            foreach ($galleries as $g) {
                if (isset($g['id'])) array_push($exist_ids, $g['id']);
            }

            $deleted = AboutUsGallery::where('about_us_id', $this->id)->whereNotIn('id', $exist_ids)->get();
            foreach ($deleted as $item) {
                if ($item->image) {
                    FileHelper::forceDeleteFiles($item->image->id, $item->id, AboutUsGallery::class, null);
                    $item->image->removeFromDB();
                }
                $item->removeFromDB();
            }

            for ($i = 0; $i < count($galleries); $i++) {
                $g = $galleries[$i];

                if (isset($g['id'])) $gallery = AboutUsGallery::find($g['id']);
                else $gallery = new AboutUsGallery();

                $gallery->about_us_id = $this->id;
                $gallery->sort = $i;
                $gallery->save();

                if (isset($g['image'])) {
                    if ($gallery->image) $gallery->image->removeFromDB();
                    $file = $g['image'];
                    FileHelper::uploadFile($file, 'about_us_gallery', $gallery->id, AboutUsGallery::class, null, 99);
                }
            }
        } else {
            $galleries = $this->galleries;
            foreach ($galleries as $gallery) {
                if ($gallery->image) {
                    FileHelper::forceDeleteFiles($gallery->image->id, $gallery->id, AboutUsGallery::class, null);
                    $gallery->image->removeFromDB();
                }
            }
            $this->galleries()->delete();
        }
    }
}
