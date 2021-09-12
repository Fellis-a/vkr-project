<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddVkrRequest extends FormRequest
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
            'title' => 'required|max:120',
            'essay' => 'required|max:500',
            'specialty_id' => 'required',
            'year' => 'required',
            'mark' => 'required',
            'tech' => 'required|max:50',


        ];
    }
    public function messages(){
      return [
        'title.required' => 'Заполните поле "Тема ВКР"',
        'title.max:120' => 'Превышено количество символов в поле "Тема ВКР"',
        'specialty_id.required' => 'Заполните поле "Специальность"',
        'year.required' => 'Заполните поле "Год защиты"',
        'mark.required' => 'Заполните поле "Оценка"',
        'tech.required' => 'Заполните поле "Технологии"',
        'tech.max:50' => 'Превышено количество символов в поле "Технологии"',
        'essay.required' => 'Заполните поле "Специальность"',
        'essay.max:500' => 'Текст реферата слишком большой',
        ];
    }

}
