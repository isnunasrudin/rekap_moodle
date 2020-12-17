<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class A extends Controller
{
    public function index()
    {
        // $data = (\App\Models\Grade::where('timecreated', '>=', 1608076800)->where('timecreated', '<=', time())->get());

        // $hasil = [];

        // $data->map(function($e) use (&$hasil) {
        //     $hasil[$e->siswa->username]['Nama'] = $e->siswa->firstname;
        //     $hasil[$e->siswa->username]['Kelas'] = $e->siswa->lastname;
        //     $hasil[$e->siswa->username][$e->pelajaran->itemname] = $e->finalgrade;
        // });

        // dd($hasil);

        // dd($data->map(function($data){
        //     return [
        //         'id_user' => $data->siswa->id,
        //         'pelajaran' => $data->pelajaran->itemname,
        //         'nama' => $data->siswa->firstname,
        //         'nisn' => $data->siswa->username,
        //         'nilai' => $data->finalgrade
        //     ];
        // }));

        // $user = $data->map(function($e){
        //     return $e->siswa->username;
        // })->toArray();

        // dd(array_unique($user));

        return \Excel::download(new \App\Exports\Susulan, 'susulan.xlsx');
    }
}
