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
        $request->validate([
            'file' => 'required|file|image|max:5000',
            'name' => 'required|string|max:255'
        ]);
        $namaFile = $request->input('name');
        $extFile = $request->file->getClientOriginalExtension();
        $path = $request->file->move('gambar', $namaFile . '.' . $extFile);
        $path = str_replace('\\', '//', $path);
        $pathBaru = asset("gambar/".$namaFile . '.' . $extFile);
        return "
        echo 'gambar berhasil disimpan di $pathBaru';
        <img style='width: 200px' src='$pathBaru'>
        ";
    }
}

