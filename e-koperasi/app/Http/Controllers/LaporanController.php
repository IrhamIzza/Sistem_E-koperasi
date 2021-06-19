<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SavingHistory;
use App\Models\Member;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $mutations = SavingHistory::with('anggota')->get();
        // $mutations = SavingHistory::whereDate('created_at', \Carbon\Carbon::now()->yesterday())->get();
        $mutations = DB::table('riwayat_tabungan')->get();


        return view('laporan.index', compact('mutations'));
    }
    public function lang($locale)
    {
        App::setLocale($locale);
        session(['locale' => $locale]);
        return redirect()->back();
    }
}
