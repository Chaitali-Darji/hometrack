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
use Illuminate\Support\Str;

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
            $this->settingRepository->saveSetting($key,$setting);
        }

        if($request->admin_logo){
            $imageName = time().Str::random(5).'.'.$request->admin_logo->extension();  
            $request->admin_logo->move(config('constants.SETTING_IMAGE_PATH'), $imageName);
            $this->settingRepository->saveSetting('admin_logo',$imageName);
        }


        if($request->admin_auth_logo){
            $imageName = time().Str::random(5).'.'.$request->admin_auth_logo->extension();  
            $request->admin_auth_logo->move(config('constants.SETTING_IMAGE_PATH'), $imageName);

            $this->settingRepository->saveSetting('admin_auth_logo',$imageName);
        }
        Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module' => Setting::MODULE_NAME]));
        return redirect()->route('settings.index');
    }
}