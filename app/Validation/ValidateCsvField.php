<?php

namespace App\Validation;


use Illuminate\Support\Facades\Validator;

class ValidateCsvField
{
    public static function checkField($file)
    {
        $fh = fopen($file, 'r');
        $arr_checkField = array();
        while (list($id, $name, $des, $com) = fgetcsv($fh, 255, ',')) {
            if($id == null || $id != 'id'){
                $arr_checkField[] = "Không có trường id";
            }
            if($name == null || $name != 'name'){
                $arr_checkField[] = "Không có trường name";
            }
            if($des == null || $des != 'description'){
                $arr_checkField[] = "Không có trường description";
            }
            if($com == null || $com != 'completed'){
                $arr_checkField[] = "Không có trường completed";
            }
            break;
        }
        return $arr_checkField;

    }

}
