<?php 

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Session;

class ClientRequest extends Request
{
    /**
     * Determine if the client is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->method == 'POST'){
            return [
                'client.name' => 'required|max:255',
                'client.email' => 'required|email|unique:clients,email|max:255',
                'client.password' => 'required|max:255',
            ];
        }
        return [];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }
}
