<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class Susulan implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $coy = 0;
        $data = (\App\Models\Grade::where('timecreated', '!=', null)->get());

        $mapel = $data->map(function($e){
            return $e->pelajaran->itemname;
        })->toArray();

        $mapel = array_unique($mapel);

        $hasil = [];

        $data->map(function($e) use (&$hasil) {
            $hasil[$e->siswa->username]['Nama'] = $e->siswa->firstname;
            $hasil[$e->siswa->username]['Kelas'] = $e->siswa->lastname;
            $hasil[$e->siswa->username][$e->pelajaran->itemname] = (int) $e->finalgrade;
        });

        foreach($hasil as $nisn => $final){
            foreach($final as $kunci => $ya )
            {
                if( $kunci == "Nama" )
                {
                    $tampilkan[] = [++$coy, $nisn, $final["Nama"], $final["Kelas"]];
                }
                elseif( $kunci != "Kelas" )
                {
                    $tampilkan[] = ['', '', '', '', $kunci, $ya];
                }
            }
            $tampilkan[] = [""];
        }

        // foreach($hasil as $key => $final)
        // {
        //     $tampilkan[$key] = [
        //         'Nama' => $final['Nama'],
        //         'Kelas' => $final['Kelas']
        //     ];

        //     foreach($mapel as $mata)
        //     {
        //         if( empty($final[$mata]) )
        //         {
        //             $tampilkan[$key][] = 0;
        //         }else{
        //             $tampilkan[$key][] = $final[$mata];
        //         }
        //         // $tampilkan[$key][] =
        //         // ($final[$mata]!= null ?
        //         // $final[$mata] 
        //         // : 0);  
        //     }
        // }

        // array_unshift($mapel, 'Nama', 'Kelas');

        array_unshift($tampilkan, ["No", "NISN", "Nama", "Kelas", "Pelajaran", "Nilai"]);

        // dd($tampilkan);

        return collect($tampilkan);
    }
}
