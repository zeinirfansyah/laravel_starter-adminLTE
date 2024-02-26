<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('home');
    }

    // public function showData()
    // {$datasQuery =DataModel::query();
    
    //     if ($request->has('search')) {
    //         $searchQuery = $request->search;
    //         $datasQuery->where(function ($query) use ($searchQuery) {
    //             $query->where('nama_dokumen', 'like', "%$searchQuery%")
    //                 ->orWhere('tahun', 'like', "%$searchQuery%");
    //         });
    //     }
    
    //     // filter by tahun
    //     if ($request->has('tahun') && $request->tahun !== 'semua') {
    //         $datasQuery->where('tahun', $request->tahun);
    //     }
    
    //     // order by tahun in descending order
    //     $datasQuery->orderByDesc('tahun');
    //     $latestData = $datasQuery->first();
    
    //     $years =DataModel::select('tahun')->distinct()->get();
    
    //     $datas = $datasQuery->paginate(4);
    
    //     return view('dataPage', [
    //         'datas' => $datas,
    //         'latestData' => $latestData,
    //         'years' => $years,
    //     ]);
    // }
}
