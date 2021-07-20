<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Redirect;
use Session;

class ArchiveController extends BaseController {

    public function restore(Request $request)
    {
        $modelName = '\App\Models\\' . $request->post('model');
        $model = new $modelName;

        if (! $archiveInfo = $model::withTrashed()->where('id',$request->post('id'))->first()) {
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.not_found',['module'=> $request->post('model')])
            ]);
        }

        $archiveInfo->restore();
        return response()->json([
            'status' => config('constants.SUCCESS_STATUS'),
            'message' => trans('response.restored', ['module' => $request->post('model')])
        ]);
    }
}