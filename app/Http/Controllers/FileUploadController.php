<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('fileUpload');
    }
    public function prosesFileUpload(Request $request)
    {
        // return "Pemorosesan file upload disini";
        // if($request->hasFile('file')){
        //     echo "path() : " . $request->file->Path();
        //     echo "<br>";
        //     echo "extention() : " . $request->file->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension() : " . $request->file->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType() : " . $request->file->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName() : " . $request->file->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize() : " . $request->file->getSize();
        // }else{
        //     echo "File tidak ada";
        // }

        $request->validate([
            'file' => 'required|file|image|max:5000'
        ]);
        echo $request->file('file')->getClientOriginalName()." lolos validasi";
    }
}
