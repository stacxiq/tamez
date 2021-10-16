<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticpationFormRequest extends FormRequest
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
          'username' => 'required|min:5|max:50',
          'type' => 'required',
          'email' => 'required|email|unique:participations',
          'phone' => 'required|unique:participations',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'البريد الالكتروني غير متوفر ',
            'usernamee.required' => 'الاسم غير متوفر',
            'type.required' => 'نوع الاشتراك غير متوفر',
            'phone.required' => 'رقم الهاتف غير متوفر',
        ];
    }
}
