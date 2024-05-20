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
        // $path = $request->file('file')->store('uploads');
        $extFile = $request->file->getClientOriginalName();
        $namaFile = "web-" . time() . "." . $extFile;
        $path = $request->file->move('gambar', $namaFile);
        $path = str_replace('\\', '//', $path);
        echo "variabel path berisi : $path <br>";

        // echo $request->file('file')->getClientOriginalName()." lolos validasi";

        $pathBaru = asset("gambar/".$namaFile);
        echo "Proses upload berhasil, File berada di : $path";
        echo "<br>";
        echo "tampilkan link : <a href='$pathBaru'>$pathBaru</a>";
    }
}
