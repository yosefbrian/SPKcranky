<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pendaftar;


class PegawaiController extends Controller
{
     public function index()
    {
    	$pendaftar = Pendaftar::paginate(10);
        return view('halaman.datapendaftar')->with('pendaftar', $pendaftar);
    }

    public function seleksi()
    {
    	$pendaftar = Pendaftar::paginate(10);
        return view('halaman.seleksi')->with('pendaftar', $pendaftar);
    }

     public function bobot(Request $request) {
        
    	$pendaftar = Pendaftar::all();

        $bobot_ipk = $request->get('bobot_ipk');
        $bobot_prestasi = $request->get('bobot_prestasi');
    	$bobot_organisasi = $request->get('bobot_organisasi');
    	$bobot_pengalaman = $request->get('bobot_pengalaman_kerja');

    	$i=0;

    	foreach ($pendaftar as $yeah) {
    		$id[$i] = $yeah->id;
    		$ipk[$i] = $yeah->ipk * $bobot_ipk;
    		$prestasi[$i] = $yeah->tingkat * $bobot_prestasi;
    		$organisasi[$i] = $yeah->posisi * $bobot_organisasi;
    		$pengalaman[$i] = $yeah->lama_kerja * $bobot_pengalaman;
    		$jumlah[$i] = $ipk[$i] + $prestasi[$i] + $organisasi[$i] + $pengalaman[$i];
    		$i+=1;
    	}
    	

         
        
          //return view('halaman.hasilseleksi')->with('pendaftar', $pendaftar);
    
    	return $jumlah;
    }

}
