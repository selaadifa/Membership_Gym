<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
 
class RequestController extends Controller

{

    public function viewPostData()
    {
        return view('request.post-data');
    }

    public function processPostData(Request $request)
    {
        echo 'Nama: ' . $request->nama . '<br>';
        echo 'Email: ' . $request->email;
    }

    public function viewGetData(Request $request)
    {
        echo '<h3>Metode GET</h3>';
        echo 'Nama: ' . $request->nama . '<br>';
        echo 'Email: ' . $request->email;
    }
}
