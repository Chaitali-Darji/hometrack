<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Session;

class PricingRequest extends Request
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
                'pricing.code' => 'required|max:255',
                'pricing.name' => 'required|max:255',
            ];
        }
        else if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                'pricing.code' => 'required|max:255',
                'pricing.name' => 'required|max:255',
            ];
        }
        return [];
    }

}
