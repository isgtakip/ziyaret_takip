<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\IsgTakipImport;
use App\Exports\IsgTakipExport;
use App\Models\IsgTakip;


class IsgTakipController extends Controller
{
    //

    public function fileImportExport()
    {
       return view('file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        /*
        $request->validate([
            'import_file' => 'required|file|mimes:xls,xlsx'
        ]);
        */

        Excel::import(new IsgTakipImport, $request->file('file')->store('temp'));
        return back();
        //return response()->json(['message' => 'uploaded successfully'], 200);
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new IsgTakipExport, 'users-collection.xlsx');
    }    

    public function getSureler(Request $request){

        $search = $request->query('search');
        $per_page = $request->query('per_page');
        $sort_by=$request->query('sort_by');
        $sortDesc=$request->query('sortDesc');


        $query=IsgTakip::selectRaw("SUM(CASE WHEN gorev_turu = 'İçe Grv.' THEN aylik_calisma_suresi ELSE 0 END) as ice_gorev_suresi, SUM(CASE WHEN gorev_turu = 'Dışa Grv.' THEN aylik_calisma_suresi ELSE 0 END) as disa_gorev_suresi,SUM(CASE WHEN gorev_turu = 'İçe Grv.' THEN aylik_calisma_suresi WHEN gorev_turu = 'Dışa Grv.' THEN -aylik_calisma_suresi ELSE 0 END) as bos_sure, id,tc,ad_soyad,personel_kategori")
        ->where('ad_soyad', 'like', '%'.$search.'%')
        ->orWhere('tc', 'like', '%'.$search.'%')
        ->groupBy('tc');

        if($sort_by!='' && $sortDesc!=''){
            if($sortDesc=='true') $query = $query->orderBy($sort_by,'desc');
            else $query = $query->orderBy($sort_by,'asc');
        }

        return response()->json($query->paginate($per_page)->appends(request()->query()),200);
    }
}
