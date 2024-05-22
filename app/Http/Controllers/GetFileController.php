<?php
namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Response;

class GetFileController extends Controller
{
    public function getById($id)
    {
        $file = File::find($id);
        return $this->check($file);
    }

    public function findAll()
    {
        $file = File::all();
        return $this->check($file);
    }

    private function check($file)
    {
        return $file
        ? response()->json(['status' => 'success', 'data' => $file], Response::HTTP_OK)
        : response()->json(['status' => 'error', 'message' => 'File not found'], Response::HTTP_NOT_FOUND);
    }
}