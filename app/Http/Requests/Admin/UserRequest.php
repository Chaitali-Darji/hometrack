<?php 

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Session;

class UserRequest extends Request
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
                'user.name' => 'required|max:255',
                'user.email' => 'required|email|unique:users,email|max:255',
                'user.password' => [
                    'required',
                    'min:8',             
                    'regex:/[a-z]/',  
                    'regex:/[A-Z]/',  
                    'regex:/[0-9]/', 
                    'regex:/[@$!%*#?&]/'
                ],
            ];
        }
        else if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $user = $this->route()->parameter('user');
            return [
                'user.name' => 'required|max:255',
                'user.email' => 'required|email|unique:users,email,'.$this->id.'|max:255',
                'user.password' => [
                    'nullable',
                    'min:8',             
                    'regex:/[a-z]/',  
                    'regex:/[A-Z]/',  
                    'regex:/[0-9]/', 
                    'regex:/[@$!%*#?&]/'
                ],
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
            return response()->json([
                'status' => config('constants.ERROR_STATUS'),
                'message' => trans('response.try_again')
            ]);
            return redirect()->back()->withInput();
        }

    }
}
