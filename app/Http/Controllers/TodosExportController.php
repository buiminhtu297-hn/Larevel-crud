<?php

namespace App\Http\Controllers;
use App\Exports\TodosExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TodosExportController extends Controller
{
    public function export()
    {
        return Excel::download(new TodosExport, 'todos.csv');
    }
}
