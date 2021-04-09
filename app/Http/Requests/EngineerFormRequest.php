<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EngineerFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            'last_name' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name_furigana' => 'required|max:255|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            'first_name_furigana' => 'required|max:255',
            'first_name_furigana' => 'required|max:255|regex:/^[ア-ン゛゜ァ-ォャ-ョー]+$/u',
            // 'birth_date' => 'required|min:8|date_format:"Y-m-d"',
            'email' => 'required|email',
            'tel' => 'numeric',
        ];
    }

    public function messages() 
    {
        return [
            'last_name.required' => '必須入力項目です',
            'first_name.required' => '必須入力項目です',
            'last_name_furigana.required' => '必須入力項目です',
            'last_name_furigana.regex' => 'カタカナでご入力ください',
            'first_name_furigana.required' => '必須入力項目です',
            'first_name_furigana.regex' => 'カタカナでご入力ください',
            'birth_date.required' => '必須入力項目です',
            'birth_date.min' => '「20200513」形式の数字8桁で入力してください',
            'birth_date.date' => '日付を入力してください',
            'email.required' => '必須入力項目です',
            'email.email' => 'E-mailアドレスを入力してください',
            'tel.numeric' => '数字をご入力ください',

        ];
    }
}
