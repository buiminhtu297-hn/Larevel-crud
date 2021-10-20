<?php

namespace App\Validation;


use Illuminate\Support\Facades\Validator;

class ValidateCsvFile
{
    public static function checkFile($params)
    {
        $attributeNames = array(
            'file'   => 'required'
        );
        $message = [
            'file.required' => 'Chưa có file xử lý!',
        ];
        return  Validator::make($params, [
            'file' => 'required|file|mimes:csv,txt'
        ], $message, $attributeNames);

    }

}
