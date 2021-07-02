<?php 

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Http\Requests\Admin\EmailTemplateRequest;
use Redirect;
use Session;
use App\Repositories\EmailTemplate\EmailTemplateRepository;

class EmailTemplateController extends BaseController {

    private $emailTemplateRepository;
    private $emailTemplate;

    public function __construct(EmailTemplateRepository $emailTemplateRepository, EmailTemplate $emailTemplate)
   {
       $this->emailTemplateRepository = $emailTemplateRepository;
       $this->emailTemplate = $emailTemplate;
   }

    /**
     * Display a listing of email templates
     *
     * @return Response
     */
    public function index()
    {
        $email_templates = $this->emailTemplateRepository->all();
        return view('admin.email-templates.index', compact('email_templates'));
    }

    /**
     * Show the form for editing the email_template.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $email_template = $this->emailTemplateRepository->find($id);
        return view('admin.email-templates.add-edit', compact('email_template'));
    }

    /**
     * Update the email_template resource in storage.
     *
     * @param  int $id
     * @param Request $request
     * @return RedirectResponse
     */
    public function update($id, EmailTemplateRequest $requestData)
    {
        if($this->emailTemplateRepository->updateEmailTemplate($id,$requestData->email_template)){
            Session::flash(config('constants.SUCCESS_STATUS'),  trans('response.update',['module'=>'Email Template']));
        }
        else{
            Session::flash(config('constants.ERROR_STATUS'), trans('response.try_again'));   
        }
        return redirect()->route('email-templates.index');
    }

}