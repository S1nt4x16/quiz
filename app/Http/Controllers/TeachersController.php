<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = DB::table('teachers as a')
            ->join('subjects as b', 'a.id_subjects', '=', 'b.id')
            ->select("a.id", "a.name", "a.city", "a.pob", "a.dob", "b.subject", "a.created_at")
            ->get();
        return view('teachers.index',
        [
            'teachers' => $teachers
        ]);
    }

    public function create()
    {
        $subjects = DB::table('subjects')
            ->select("id", "subject", "hours")
            ->get();
        return view('teachers.create', 
        [
            'subjects' => $subjects
        ]);
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $city = $request->input('city');
        $pob = $request->input('pob');
        $dob = $request->input('dob');
        $subjects = $request->input('subjects');

        DB::table('teachers')
        ->insert([
            'name'=> $name,
            'city'=> $city,
            'pob'=> $pob,
            'dob'=> $dob,
            'id_subjects'=> $subjects,
            'created_at' => now()
        ]);

        return redirect()->route('teachers_master')->with('success', 'Berhasil Membuat Data');
          
    }

    public function edit($id)
    {
        $teachers = DB::table('teachers')
            ->select("name", "city", "pob", "dob", "id_subjects")
            ->where('id',$id)
            ->first();
        $subjects = DB::table('subjects')
            ->select("id", "subject")
            ->get();
        return view('teachers.edit', [
            "teachers" => $teachers,
            "subjects" => $subjects,
            "id" => $id
        ]);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $city = $request->input('city');
        $pob = $request->input('pob');
        $dob = $request->input('dob');
        $subjects = $request->input('subjects');

        DB::table('teachers')
        ->where('id', $id)
        ->update([

            'name' => $name,
            'city' => $city,
            'pob' => $pob,
            'dob' => $dob,
            'id_subjects' => $subjects,
            'created_at' => now()

        ]);

        return redirect()->route('teachers_master')->with('berhasil', 'Anda Berhasil Mengupdate Data');
    }

    public function delete($id) 
    {
        DB::table('teachers')->where('id', $id)->delete();

        return redirect()->route('teachers_master')->with('gagal', 'Berhasil Menghapus Data');
    }
}
