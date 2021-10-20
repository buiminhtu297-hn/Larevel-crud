<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Validation\ValidateCsvField;
use App\Validation\ValidateCsvFile;
use Illuminate\Http\Request;

class TodosImportController extends Controller
{
    public function show()
    {
        return view('todos.import');
    }

    public function store(Request $request)
    {
        $validator = ValidateCsvFile::checkFile($request->all());
        if ($validator->fails()) {
            return view('todos.import', ['messageCheckFile' => $validator->errors()->first()]);
        }

        $file = $request->file('file');
        $fh = fopen($file, 'r');

        $arr_checkField = ValidateCsvField::checkField($file);
        if(count($arr_checkField) != 0){
            return view('todos.import', ['checkField' => $arr_checkField]);
        }

        $ids_Todo = Todo::all()->pluck('id')->all();
        $ids = array();
        $error_validate = array();
        $index_row = 0;
        while (list($id, $name, $des, $com) = fgetcsv($fh, 255, ',')) {
            $index_row++;
            if($index_row == 1){
                continue;
            }
            if ($id == null) {
                $error_validate[] = "Lỗi dòng thứ " . $index_row . ": Không được để trống id";
            }
            if ($name == null) {
                $error_validate[] = "Lỗi dòng thứ " . $index_row . ": Không được để trống name";
            }
            $ids[] = $id;
            if($index_row%1000==0){
                $result_uniqueId = array_intersect($ids_Todo, $ids);
                if (count($result_uniqueId) != 0) {
                    foreach ($result_uniqueId as $uniqueId){
                        $error_validate[] = "Id " . $uniqueId . " bị trùng!";
                    }
                    break;
                }
                else{
                    $ids = array();
                }
            }
        }
        if($index_row < 1000){
            $result_uniqueId = array_intersect($ids_Todo, $ids);
            if (count($result_uniqueId) != 0) {
                foreach ($result_uniqueId as $uniqueId){
                    $error_validate[] = "Id " . $uniqueId . " bị trùng";
                }
            }
        }


        if (count($error_validate) != 0) {
            return view('todos.import', ['messageCheckValidate' => $error_validate]);
        } else {
            $index = 0;
            $fh = fopen($file, 'r');
            $arrayQuery = array();
            $link = mysqli_connect('localhost', 'root', '1234', 'todos_app');
            $TABLENAME = "todos";
            $query = 'INSERT INTO ' . $TABLENAME . '(id, name, description,completed) VALUES ';
            while (list($id, $name, $des, $com) = fgetcsv($fh, 255, ',')) {
                $index++;
                if($index == 1){
                    continue;
                }
                $query = $query . '(' . $id . ',"' . $name . '","' . $des . '","' . $com . '"),';
                if ($index % 1000 == 0) {
                    $arrayQuery[] = $query;
                    $query = 'INSERT INTO ' . $TABLENAME . '(id, name, description,completed) VALUES ';
                } else {
                    if ($index == $index_row) {
                        $arrayQuery[] = $query;
                    }
                }
            }
            foreach ($arrayQuery as $query) {
                $query = rtrim($query, ",");
                mysqli_query($link, $query);
            }
            return back()->withStatus('Import successfully!');
        }
    }
}
