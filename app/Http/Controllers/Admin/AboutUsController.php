<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use stdClass;
use Exception;
use App\Model\Admin\AboutUs as ThisModel;
use App\Helpers\FileHelper;

class AboutUsController extends Controller
{
    protected $view = 'admin.about_us';
    protected $route = 'about_us';

    public function index()
    {
        return view($this->view . '.index');
    }

    // Hàm lấy data cho bảng list
    public function searchData(Request $request)
    {
        $objects = ThisModel::searchByFilter($request);
        return Datatables::of($objects)
            ->editColumn('updated_by', function ($object) {
                return $object->user_update->name ?? '';
            })
            ->editColumn('created_by', function ($object) {
                return $object->user_update->name ?? '';
            })
            ->editColumn('updated_at', function ($object) {
                return formatDate($object->updated_at);
            })
            ->editColumn('position', function ($object) {
                return $object->position == 1 ? 'Banner lớn' : 'Banner nhỏ';
            })
            ->editColumn('link', function ($object) {
                return '<a href="' . $object->link . '">' . $object->link . '</a>';
            })
            ->addColumn('image', function ($object) {
                return '<img class="thumbnail img-preview" src="' . ($object->image ? $object->image->path : '') . '">';
            })
            ->addColumn('action', function ($object) {
                $result = '';
                $result .= '<a href="javascript:void(0)" title="Sửa" class="btn btn-sm btn-primary edit"><i class="fas fa-pencil-alt"></i></a> ';
                $result .= '<a href="' . route($this->route . '.delete', $object->id) . '" title="Xóa" class="btn btn-sm btn-danger confirm"><i class="fas fa-times"></i></a>';
                return $result;
            })
            ->addIndexColumn()
            ->rawColumns(['link', 'action', 'image'])
            ->make(true);
    }

    public function create()
    {
        return view($this->view . '.create');
    }

    public function edit(Request $request, $id)
    {
        $object = ThisModel::getDataForEdit($id);
        return view($this->view . '.edit', compact('object'));
    }

    public function update(Request $request, $id)
    {

        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'description' => 'required',
                'content' => 'required',
                'mission' => 'nullable',
                'vision' => 'nullable',
                'core_values' => 'nullable',
                'raw_material_area' => 'nullable',
                'image' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
                'mission_image' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
                'vision_image' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
                'core_values_image' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
                'raw_material_area_image' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
                'galleries' => 'nullable|array',
                'galleries.*.image' => 'nullable|file|mimes:jpg,jpeg,png|max:10240',
            ]
        );
        $json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Thao tác thất bại!";
            return Response::json($json);
        }

        DB::beginTransaction();
        try {
            $object = ThisModel::findOrFail($id);
            $object->name = $request->name;
            $object->description = $request->description;
            $object->content = $request->content;
            $object->mission = $request->mission;
            $object->vision = $request->vision;
            $object->core_values = $request->core_values;
            $object->raw_material_area = $request->raw_material_area;
            $object->save();

            if ($request->image) {

                if ($object->image) {
                    FileHelper::forceDeleteFiles($object->image->id, $object->id, ThisModel::class, 'image');
                }

                FileHelper::uploadFile($request->image, 'banners', $object->id, ThisModel::class, 'image', 99);
            }

            if ($request->mission_image) {
                if ($object->mission_image) {
                    FileHelper::forceDeleteFiles($object->mission_image->id, $object->id, ThisModel::class, 'mission_image');
                }
                FileHelper::uploadFile($request->mission_image, 'banners', $object->id, ThisModel::class, 'mission_image', 99);
            }

            if ($request->vision_image) {
                if ($object->vision_image) {
                    FileHelper::forceDeleteFiles($object->vision_image->id, $object->id, ThisModel::class, 'vision_image');
                }
                FileHelper::uploadFile($request->vision_image, 'banners', $object->id, ThisModel::class, 'vision_image', 99);
            }

            if ($request->core_values_image) {
                if ($object->core_values_image) {
                    FileHelper::forceDeleteFiles($object->core_values_image->id, $object->id, ThisModel::class, 'core_values_image');
                }
                FileHelper::uploadFile($request->core_values_image, 'banners', $object->id, ThisModel::class, 'core_values_image', 99);
            }

            if ($request->raw_material_area_image) {
                if ($object->raw_material_area_image) {
                    FileHelper::forceDeleteFiles($object->raw_material_area_image->id, $object->id, ThisModel::class, 'raw_material_area_image');
                }
                FileHelper::uploadFile($request->raw_material_area_image, 'banners', $object->id, ThisModel::class, 'raw_material_area_image', 99);
            }

            if ($request->galleries) {
                $object->syncGalleries($request->galleries);
            }

            DB::commit();
            $json->success = true;
            $json->message = "Thao tác thành công!";
            $json->data = $object;
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function delete($id)
    {
        $object = ThisModel::findOrFail($id);
        if (!$object->canDelete()) {
            $message = array(
                "message" => "Không thể xóa!",
                "alert-type" => "warning"
            );
        } else {
            if (isset($object->image)) {
                FileHelper::forceDeleteFiles($object->image->id, $object->id, ThisModel::class, 'image');
            }
            if (isset($object->mission_image)) {
                FileHelper::forceDeleteFiles($object->mission_image->id, $object->id, ThisModel::class, 'mission_image');
            }
            if (isset($object->vision_image)) {
                FileHelper::forceDeleteFiles($object->vision_image->id, $object->id, ThisModel::class, 'vision_image');
            }
            if (isset($object->core_values_image)) {
                FileHelper::forceDeleteFiles($object->core_values_image->id, $object->id, ThisModel::class, 'core_values_image');
            }
            if (isset($object->raw_material_area_image)) {
                FileHelper::forceDeleteFiles($object->raw_material_area_image->id, $object->id, ThisModel::class, 'raw_material_area_image');
            }
            if (isset($object->galleries)) {
                foreach ($object->galleries as $gallery) {
                    if (isset($gallery->image)) {
                        FileHelper::forceDeleteFiles($gallery->image->id, $gallery->id, AboutUsGallery::class, null);
                        $gallery->image->removeFromDB();
                    }
                    $gallery->removeFromDB();
                }
            }
            $object->delete();
            $message = array(
                "message" => "Thao tác thành công!",
                "alert-type" => "success"
            );
        }


        return redirect()->route($this->route . '.index')->with($message);
    }
}
