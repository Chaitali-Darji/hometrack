<?php 

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Session;

class SalesTaxRequest extends Request
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
                'salestax.state_id' => 'required',
                'salestax.tax' => 'required',
            ];
        }
        else if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'salestax.state_id' => 'required',
                'salestax.tax' => 'required',
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