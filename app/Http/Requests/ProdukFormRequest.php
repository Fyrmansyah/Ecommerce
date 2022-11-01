<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukFormRequest extends FormRequest
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
        return [
            'category_id' => [
                'required',
                'integer',
            ],
            'keterangan' => [
                'required',
                'integer',
            ],
            'deskripsi' => [
                'required',
                'integer',
            ],
            'harga' => [
                'required',
                'integer',
            ],
            'stok' => [
                'required',
                'integer',
            ],
            'image' => [
                'required',
                'integer',
            ],
            
          
        ];
    }
}
