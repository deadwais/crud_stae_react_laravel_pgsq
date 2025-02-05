<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $emailValide= "unique:users";
        if($this-> method() == "PATCH"){
           $emailValide= "unique:users,email".$this->id;
        }
        return  [
            'name' => 'required',
             'email'=> 'required|email|'.$this->id,
            'password'=> 'required|min:6',
        ];

}
}
