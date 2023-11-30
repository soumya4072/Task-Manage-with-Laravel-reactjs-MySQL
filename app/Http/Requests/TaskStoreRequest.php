<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if(request()->isMethod('post')){
            return [
                'title'=>'required|string|max:258',
                'description'=>'string',
            ];
       }else{
            return [
                'title'=>'required|string|max:258',
                'description'=>'string',
            ];
       }
    }

    public function messages(){
        if(request()->isMethod('post')){
            return[
                'title.required'=>'Title is required',
            ];
        }
    }
}
