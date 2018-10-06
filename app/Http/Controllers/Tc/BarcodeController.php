<?php

namespace App\Http\Controllers\Tc;

use App\Http\Repos\BarcodeRepo;
//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class BarcodeController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(BarcodeRepo $barcodeRepo)
    {
        $request = request();

        //validate the xls file
        $this->validate($request, array(
            'file'      => 'required'
        ));

        //if($request->hasFile('file')){
            $extension = File::extension($request->file->getClientOriginalName());
            $status = [];
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

                $path = $request->file->getRealPath();
                $data = Excel::load($path, function($reader) {
                })->get();
                if(!empty($data) && $data->count()){

                    foreach ($data as $key => $value) {
                        $insert[] = [
                            'code' => $value->name
                        ];
                    }

                    if(!empty($insert)){

                        $insertData = $barcodeRepo->create($insert);
                        if ($insertData) {
                            $status = [
                                'status'    => 'success',
                                'message'   => 'Barcode(s) successfully imported'
                            ];
                        }else {
                            $status = [
                                'status'    => 'error',
                                'message'   => 'Error importing barcode(s)'
                            ];
                        }
                    }
                }

                //return back();

            }else {
                $status = [
                    'status'    => 'error',
                    'message'   => 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!'
                ];
                //return back();
            }

            return response()->json($status);
        //}

    }

    public function edit($id)
    {

    }

    public function update($id)
    {

    }
}
