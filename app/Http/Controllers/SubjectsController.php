<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index()
    {
        $subjects = DB::table('subjects')
            ->select("id", "subject","hours", "created_at")
            ->get();
        return view('subjects.index', ["subjects" => $subjects]);
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $subject = $request->input('subject');
        $hours = $request->input('hours');

        DB::table('subjects')
        ->insert([
            'subject'=> $subject,
            'hours'=> $hours,
            'created_at' => now()
        ]);

        return redirect()->route('subjects_master')->with('success', 'Berhasil Membuat Data');
          
    }

    public function edit($id)
    {
        $subject = DB::table('subjects')
            ->select("subject", "hours")
            ->where('id',$id)
            ->first();
        return view('subjects.edit', [
            "s" => $subject,
            "id" => $id
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $subject = $request->input('subject');
        $hours = $request->input('hours');

        DB::table('subjects')
        ->where('id', $id)
        ->update([

            'subject' => $subject,
            'hours' => $hours,
            'created_at' => now()

        ]);

        return redirect()->route('subjects_master')->with('berhasil', 'Anda Berhasil Mengupdate Data');
    }

    public function delete($id) 
    {
        DB::table('subjects')->where('id', $id)->delete();

        return redirect()->route('subjects_master')->with('gagal', 'Berhasil Menghapus Data');
    }
}
