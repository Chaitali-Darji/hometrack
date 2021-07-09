<?php 

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\SMSTemplate;
use App\Models\User;
use App\Http\Requests\Admin\SMSTemplateRequest;
use Redirect;
use Session;
use App\Repositories\SMSTemplate\SMSTemplateRepository;
use App\Repositories\Setting\SettingRepository;

class SMSTemplateController extends BaseController {

    private $SMSTemplateRepository;
    private $SMSTemplate;
    private $SettingRepository;

    public function __construct(SMSTemplateRepository $SMSTemplateRepository,SettingRepository $settingRepository,  SMSTemplate $SMSTemplate)
    {
       $this->SMSTemplateRepository = $SMSTemplateRepository;
       $this->SMSTemplate = $SMSTemplate;
       $this->settingRepository = $settingRepository;
    }

    /**
     * Display a listing of sms templates
     *
     * @return Response
     */
    public function index()
    {
        $sms_templates = $this->SMSTemplateRepository->all();
        return view('admin.sms-templates.index', compact('sms_templates'));
    }

    /**
     * Show the form for editing the sms_template.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if(!$sms_template = $this->SMSTemplateRepository->find($id)){
            Session::flash(config('constants.ERROR_STATUS'), trans('response.not_found',['module' => SMSTemplate::MODULE_NAME]));
            return redirect()->route('sms-templates.index');
        }
        return view('admin.sms-templates.add-edit', compact('sms_template','users'));
    }

    /**
     * Update the sms_template resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function changeSmsTemplate(Request $requestData)
    {
        if($this->SMSTemplateRepository->updateSMSTemplate($requestData->id,$requestData->sms_template)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module' => SMSTemplate::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));   
        }
        return redirect()->route('sms-templates.index');
    }

    /**
     * Update the sms_template resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function changeAppointmentReminder(Request $requestData)
    {
        if($this->settingRepository->saveSetting('appointment_reminder_time',$requestData->time)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module' => SMSTemplate::MODULE_NAME]));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));   
        }
        return redirect()->route('sms-templates.index');
    }


    public function sendTestSMS(Request $request)
    {
        Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.sent',['module' => SMSTemplate::MODULE_NAME]));
        return redirect()->route('sms-templates.index');
    }
}