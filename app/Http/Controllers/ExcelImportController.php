<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use Illuminate\Support\Facades\Input;

class ExcelImportController extends Controller
{
    public function importExport()
    {
        return view('admin.importExport');
    }
    public function downloadExcel($type)
    {
        $data = Item::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
//            dd($path);
            $data = Excel::load($path, function($reader) {
            })->get();
//            dd($data);
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['keyword' => $value->keyword, 'weight' => $value->weight];
                }
                if(!empty($insert)){
                    DB::table('rates')->insert($insert);
                    $success = "Dictionary Imported Successfully !";
                    return redirect()->back()->with('success',$success);
                }
            }
        }
        return back();
    }
}
