<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
        $id = $this->request->get('id');
//        dd($this->request->get('id'));
        return [
            'title' => 'required|max:75',
            'url' => 'max:100|unique:pages,url,'.$id,
            'meta_title' => 'max:75',
            'meta_keywords' => 'max:250',
            'meta_description' => 'max:200',
        ];
    }
}
