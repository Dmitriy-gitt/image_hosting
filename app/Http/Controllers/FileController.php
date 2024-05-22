<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\File;

class Filecontroller extends Controller
{
    
    public function index()
    {
        return view('load.load');
    }

    public function download(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'files' => 'max:5', // Ограничиваем количество файлов до 5
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->isMethod('post')) {
            if ($request->hasFile('files')) {
                $files = $request->file('files');
                foreach ($files as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'file' . time() . '_' . str_replace(['.', '-'], '', uniqid()) . '.' . strtolower($extension);
                    $filename = preg_replace('/[^a-z.]/', '', $filename);
                    $path = $file->move(public_path() . '/images', $filename);

                    $fileModel = new File;
                    $fileModel->name = $filename;
                    $fileModel->save();
                }

                return view('load.answer', compact('filename'));
            }
        }

        return view('load.answer');
    }

    public function destroy($id)
    {
        $file = File::findOrFail($id);
        $file->delete();

        return redirect()->back()->with('success', 'Файл успешно удален.');
    }
}
