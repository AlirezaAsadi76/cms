<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Log::debug('authorize :',['Route parameter'=>$this->route('post')]);
        $post=$this->route('post');
        $answ=$post && $this->user()->can('update',$post);
        Log::debug('authorize :',['post'=>$post->id,'answer'=>$answ]);
        return $answ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'thumbnail'=>'required',
            'title'=>'required',
            'details'=>'required',
            'category_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'thumbnail.required'=>'Enter thumbnail url',
            'title.required'=>'Enter title',
            'details.required'=>'Enter details',
            'category_id.required'=>'select categories'
        ];
    }
}
