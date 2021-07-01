<?php 

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Repositories\Setting\SettingRepository;
use App\Models\Setting;
use Redirect;
use Session;

class SettingController extends BaseController {

    private $settingRepository;
    private $setting;

    public function __construct(SettingRepository $settingRepository, Setting $setting)
    {
       $this->settingRepository = $settingRepository;
       $this->setting = $setting;
    }

    /**
     * Display form
     *
     * @return Response
     */
    public function index()
    {
        $settings = $this->setting->pluck('value','key')->toArray();
        return view('admin.settings.add-edit', compact('settings'));
    }


    public function changeSetting(Request $request){

        foreach($request->setting as $key => $setting){

            $setting_info = $this->setting->where('key',$key)->first();
            if(empty($setting_info)){
                $this->settingRepository->create([
                    'key' => $key,
                    'value' => $setting
                ]);
            }
            else{
                $this->settingRepository->updateSetting(
                    [ 'key' => $key ],
                    [ 'value' => $setting ]
                );
            }
        }

        Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module'=>'Setting']));
        return redirect()->route('settings.index');
    }
}