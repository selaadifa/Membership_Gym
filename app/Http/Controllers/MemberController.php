<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function MemberView()
    {
        $data['allDataMember']=Member::all();
        return view('member.viewmember', $data);
    }

    public function MemberAdd()
    {
        return view('member.addmember');
    }

    public function MemberStore(Request $request)
    {   
        $validatedData=$request->validate([
            'nama' =>'required',
        ]);
        //dd($request);
        $data=new Member();
        $data->nama=$request->nama;
        $data->alamat=$request->alamat;
        $data->no_telp=$request->no_telp;
        $data->tanggal=$request->tanggal;
        $data->save();

        return redirect()->route('member.view')->with('info','Tambah Member berhasil');
    }

    public function MemberEdit($id)
    {
        $editData= Member::find($id);
        return view('member.editmember', compact('editData'));
    }

    public function MemberUpdate(Request $request, $id)
    {   
        $validatedData=$request->validate([
            'nama' =>'required',
        ]);
        //dd($request);
        $data=Member::find($id);
        $data->nama=$request->nama;
        $data->alamat=$request->alamat;
        $data->no_telp=$request->no_telp;
        $data->tanggal=$request->tanggal;
        $data->save();

        return redirect()->route('member.view')->with('info','Update Member berhasil');
    }

    public function MemberDelete($id)
    {
        $deleteData= Member::find($id);
        $deleteData->delete();

        return redirect()->route('member.view')->with('info','Delete Member Berhasil');
    }
}