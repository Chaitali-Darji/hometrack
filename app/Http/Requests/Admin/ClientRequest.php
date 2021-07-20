<?php 

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Session;

class ClientRequest extends Request
{
     /**
     * Determine if the user is authorized to make this request.
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
        if($this->method() == 'POST'){
            return [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|unique:clients,email|max:255',
                'mobile_phone' => 'required|max:255',
                'office_phone' => 'required|max:255',
            ];
        }
        else if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $client = $this->route()->parameter('client');
            return [
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email|unique:clients,email,' . $this->id . '|max:255',
                'mobile_phone' => 'required|max:255',
                'office_phone' => 'required|max:255',
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

}
