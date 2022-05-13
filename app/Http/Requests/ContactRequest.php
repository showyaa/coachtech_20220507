<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PostCodeRule;

class ContactRequest extends FormRequest
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
            'fullname' => 'required|max:30',
            'gender' => 'required',
            'email' => 'required|email',
            'postcode' => ['required', new PostCodeRule()],
            'address' => 'required|max:50',
            'building_name' => 'max:30',
            'opinion' => 'required|max:120',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'お名前は必須項目になります',
            'fullname.max' => '30文字以内で入力してください',
            'email.required' => 'メールアドレスは必須項目になります',
            'email.email' => 'メールアドレスに不備があるようです',
            'postcode.required' => '郵便番号は必須項目になります',
            'address.required' => '住所は必須項目になります',
            'address.max' => '50文字以内で入力してください',
            'building_name.max' => '30文字以内で入力してください',
            'opinion.required' => 'ご記入いただけると幸いです',
            'opinion.max' => '120文字以内で入力してください',
        ];
    }
}
