<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Session;

class SettingsRequest extends Request
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
        return [
            'setting.name' => 'required|max:255',
            'admin_logo' => 'nullable|mimes:jpeg,jpg,png,gif',
            'admin_auth_logo' => 'nullable|mimes:jpeg,jpg,png,gif',
        ];
    }
}
