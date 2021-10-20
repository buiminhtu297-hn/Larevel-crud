<?php

namespace App\Console\Commands;

use App\Imports\TodosImport;
use App\Models\Todo;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ImportFileCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importfile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        Log::channel('importLogging')->info('Start!');
//
//        $count_error=0;
//        $file = storage_path('todos.csv');
//        $fh = fopen($file,'r');
//
//        $ids_Todo = Todo::all()->pluck('id')->all();
//
//        $index = 0;
//        $ids = array();
//        $error_validate = array();
//        while (list($id,$name,$des,$com) = fgetcsv($fh,100000,',')){
//            $index++;
//            if($id == null){
//                echo "Lỗi dòng thứ ".$index.": Không được để trống id";
//                $count_error++;
//            }
//            if($name == null){
//                echo "Lỗi dòng thứ ".$index.": Không được để trống name";
//                $count_error++;
//            }
//            $ids[] = $id;
//                $errors = array_intersect($ids_Todo,$ids);
//                echo count($errors);
//
//        }
//        if(count($error_validate) != 0)
//        foreach ($error_validate[0] as $item){
//            echo $item;
//        }
//        if($count_error == 0 ){
//            $i = 0;
//            $fh = fopen($file,'r');
//            $arrayQuery = array();
//            $link = mysqli_connect('localhost','root','1234','todos_app');
//            $TABLENAME = "todos";
//            $query = 'INSERT INTO ' . $TABLENAME . '(id, name, description,completed) VALUES ';
//            while (list($id,$name,$des,$com) = fgetcsv($fh,100000,',')){
//                $i++;
//                $query = $query . '(' . $id . ',"' . $name . '","' . $des . '","' . $com . '"),';
//
//                if($i%1000==0){
//                    $arrayQuery[] = $query;
//                    $query = 'INSERT INTO ' . $TABLENAME . '(id, name, description,completed) VALUES ';
//                }
//                else {
//                    if($i == $index){
//                        $arrayQuery[] = $query;
//                    }
//                }
//            }
//            foreach ($arrayQuery as $item){
//                $item = rtrim($item, ",");
//                echo $item;
//            }
//            foreach ($arrayQuery as $query){
//                $query = rtrim($query, ",");
//                mysqli_query($link, $query);
//            }
//            Log::channel('importLogging')->info('Import File Successfully!');
//            echo 'Import File Successfully!';
        }





}
