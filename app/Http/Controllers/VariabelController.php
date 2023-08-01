<?php

namespace App\Http\Controllers;

use App\Models\Variabel;
use Illuminate\Http\Request;
use App\Imports\VariabelImport;
use Illuminate\Console\View\Components\Component;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class VariabelController extends Controller
{
    public function main(Request $request)
    {
        $search = $request->input('search');
        $variabels = Variabel::orderBy('total', 'desc')
            ->when($search, function ($query, $search) {
                return $query->where('nama_ruas', 'like', '%' . $search . '%');
            })
            ->get();

        return view('welcome', compact('variabels', 'search'));
    }
    public function index(Request $request)
    {
        $search = $request->input('search');

        $variabels = Variabel::orderBy('total', 'desc')
            ->when($search, function ($query, $search) {
                return $query->where('nama_ruas', 'like', '%' . $search . '%');
            })
            ->get();

        return view('adminpage.anggaran', compact('variabels', 'search'));
    }
    public function Userindex(Request $request)
    {
        $search = $request->input('search');

        $variabels = Variabel::all();
        $id = 1;
        $anggaranInput = Variabel::find($id);
        return view('welcome', compact('variabels', 'anggaranInput', 'search'));
    }
    public function importExcel(Request $request)
    {
        // Hapus semua data variabel yang ada di database
        Variabel::truncate();

        $file = $request->file('file');

        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $data = $worksheet->toArray();

        foreach ($data as $row) {
            if ($row[0] == 'NO') {
                continue;
            }

            $variabel = new Variabel([
                'no' => (int)$row[0],
                'nama_ruas' => $row[1],
                'panjang_ruas' => floatval(str_replace(',', '.', $row[2])),
                'pr_tidak_mantap' => floatval(str_replace(',', '.', $row[3])), // Tambahkan kolom ini
                'variabel1' => (int)$row[4],
                'variabel2' => (int)$row[5],
                'variabel3' => (int)$row[6],
                'variabel4' => (int)$row[7],
                'variabel5' => (int)$row[8],
                'total' => floatval(str_replace(',', '.', $row[9])),
            ]);
            $variabel->save();
        }

        return redirect()->back()->with('successExcel', 'Data imported successfully.');
    }

    public function searchVariabels(Request $request)
    {
        $keyword = $request->input('keyword');
        $variabels = Variabel::where('nama_ruas', 'LIKE', '%' . $keyword . '%')->get();
        return view('adminpage.anggaran', compact('variabels'));
    }
    public function UserSearch(Request $request)
    {
        $keyword = $request->input('keyword');
        $variabels = Variabel::where('nama_ruas', 'LIKE', '%' . $keyword . '%')->get();
        return view('welcome', compact('variabels'));
    }

    public function editVariabel($id)
    {
        $variabel = Variabel::find($id);
        $allVariabels = Variabel::pluck('nama_ruas', 'id');

        $variabelValues = Variabel::where('nama_ruas', $variabel->nama_ruas)->first();

        return view('adminpage.edit_variabel', compact('variabel', 'allVariabels', 'variabelValues'));
    }

    public function updateVariabel(Request $request, $id)
    {
        $variabel = Variabel::find($id);

        // Simpan perubahan nama ruas jika ada
        $namaRuasId = $request->input('nama_ruas');
        if ($variabel->id != $namaRuasId) {
            $namaRuas = Variabel::find($namaRuasId)->nama_ruas;
            $variabel->nama_ruas = $namaRuas;

            // Update nilai variabel sesuai dengan nama ruas yang dipilih
            $variabelValues = Variabel::where('nama_ruas', $namaRuas)->first();
            $variabel->panjang_ruas = $variabelValues->panjang_ruas;
            $variabel->pr_tidak_mantap = $variabelValues->pr_tidak_mantap; // Tambahkan kolom ini
            $variabel->variabel1 = $variabelValues->variabel1;
            $variabel->variabel2 = $variabelValues->variabel2;
            $variabel->variabel3 = $variabelValues->variabel3;
            $variabel->variabel4 = $variabelValues->variabel4;
            $variabel->variabel5 = $variabelValues->variabel5;
        } else {
            // Simpan nilai variabel yang telah diubah
            $variabel->panjang_ruas = $request->input('panjang_ruas');
            $variabel->pr_tidak_mantap = $request->input('pr_tidak_mantap'); // Tambahkan kolom ini
            $variabel->variabel1 = $request->input('variabel1');
            $variabel->variabel2 = $request->input('variabel2');
            $variabel->variabel3 = $request->input('variabel3');
            $variabel->variabel4 = $request->input('variabel4');
            $variabel->variabel5 = $request->input('variabel5');
        }

        $variabel->save();

        return redirect()->route('variabels')->with('success', 'Variabel data updated successfully.');
    }

    public function getVariabelValues(Request $request)
    {
        $id = $request->input('id');
        $variabel = Variabel::find($id);

        return response()->json([
            'variabel1' => $variabel->variabel1,
            'variabel2' => $variabel->variabel2,
            'variabel3' => $variabel->variabel3,
            'variabel4' => $variabel->variabel4,
            'variabel5' => $variabel->variabel5,
        ]);
    }

    public function tahapDua()
    {
        $variabelss = Variabel::all();
        $totalPrTidakMantap = Variabel::sum('pr_tidak_mantap');

        foreach ($variabelss as $variabel) {
            if ($totalPrTidakMantap != 0) {
                $variabel->persen_tidak_mantap = ($variabel->pr_tidak_mantap / $totalPrTidakMantap) * 100;
            } else {
                $variabel->persen_tidak_mantap = 0;
            }

            $variabel->save();
        }

        $functions = [
            [
                'threshold' => 80,
                'weight' => 100,
                'prs' => 40
            ],
            [
                'threshold' => 60,
                'weight' => 79,
                'prs' => 30
            ],
            [
                'threshold' => 30,
                'weight' => 59,
                'prs' => 20
            ],
            [
                'threshold' => 0,
                'weight' => 29,
                'prs' => 10
            ],
        ];
        $variabels = Variabel::all();

        return view('adminpage.tahap_dua', compact('variabels', 'functions'));
    }


    public function updateFunction(Request $request)
    {
        // Validasi data yang diterima dari admin
        $request->validate([
            'functions.*.threshold' => 'required|numeric|min:0',
            'functions.*.weight' => 'required|numeric|min:0|max:100',
            'functions.*.prs' => 'required',
        ]);

        $functions = $request->input('functions');

        // Mengambil ulang data variabel sebelum diupdate
        $variabels = Variabel::all();

        $totalPrTidakMantap = Variabel::sum('pr_tidak_mantap');

        foreach ($variabels as $variabel) {
            if ($totalPrTidakMantap != 0) {
                $variabel->persen_tidak_mantap = ($variabel->pr_tidak_mantap / $totalPrTidakMantap) * 100;
            } else {
                $variabel->persen_tidak_mantap = 0;
            }

            $variabel->bobot = $this->calculateWeight($variabel->total, $functions);
            $variabel->save();
        }

        // Mengambil ulang data variabel setelah diupdate
        $variabels = Variabel::all();

        return view('adminpage.tahap_dua', compact('variabels', 'functions'))->with('success', 'Fungsi bobot berhasil diperbarui.');
    }




    private function calculateWeight($total, $functions)
    {
        $weight = 0;

        foreach ($functions as $function) {
            // if ($total > $function['threshold']) {
            if ($total >= $function['threshold'] && $total <= $function['weight']) {
                $weight = $function['prs'];
                break;
            }
        }

        return $weight;
    }
    public function calculateBudget(Request $request)
    {
        $budget = (int) $request->input('budget');

        // Get all variabels from the database
        $variabels = Variabel::all();

        // Perform the budget calculation and save the data to the database
        // foreach ($variabels as $variabel) {
        //     $prTidakMantap = $variabel->pr_tidak_mantap;
        //     // $total = $variabel->total;
        //     $bobot = (float) $variabel-> bobot / 100;

        //     // Calculate the allocated budget for the current variabel
        //     $allocatedBudget = $budget * $bobot;

        //     // Calculate the dana anggaran for the current variabel
        //     // $persenTidakMantap = ($prTidakMantap / $total) * 100;
        //     $danaAnggaran = $allocatedBudget * $variabel -> persen_tidak_mantap;
        //     $danaAnggaran /= 100;

        //     // Update the "dana_anggaran" and "inputted_budget" columns in the database for the current variabel
        //     // $variabel->dana_anggaran = $danaAnggaran;
        //     $variabel->dana_anggaran = (int) $danaAnggaran;
        //     $variabel->inputted_budget = $budget;
        //     $variabel->save();
        // }

        $functions = $request -> input('functions');

        foreach($functions as $function) {
            $total = 0;
            foreach($variabels as $variabel) {
                if ($variabel -> total >= $function['threshold'] && $variabel -> total <= $function['weight']){
                    $total += $variabel -> pr_tidak_mantap;
                }
            }
            foreach($variabels as $variabel) {
                if ($variabel -> total >= $function['threshold'] && $variabel -> total <= $function['weight']){
                    $bobot = (float) $variabel-> bobot / 100;
                    
                    $allocatedBudget = $budget * $bobot;
                    
                    $persenTidakMantap = ((float) $variabel -> pr_tidak_mantap / $total);
                    
                    $danaAnggaran = (int) $allocatedBudget * $persenTidakMantap;

                    $variabel->dana_anggaran = (int) $danaAnggaran;
                    $variabel->inputted_budget = $budget;
                    $variabel->save();
                }
            }
        }

        $danaBerhasil = true;

        // return response()->json(['status' => 'success', 'message' => 'Dana Anggaran successfully calculated and updated.'])->with('functions', $request -> input('functions'));
        return view('adminpage.tahap_dua', compact('variabels', 'functions', 'danaBerhasil'));
    }



    public function updateDanaAnggaran(Request $request)
    {
        $request->validate([
            'variabelId' => 'required|exists:variabels,id',
            'danaAnggaran' => 'required|numeric|min:0',
        ]);

        $variabelId = $request->input('variabelId');
        $danaAnggaran = $request->input('danaAnggaran');

        // Update the "Dana Anggaran" value in the database for the corresponding variabel ID
        $variabel = Variabel::findOrFail($variabelId);
        $variabel->dana_anggaran = $danaAnggaran;
        $variabel->save();

        return response()->json(['status' => 'success', 'danaAnggaran' => $danaAnggaran, 'message' => 'Dana Anggaran updated successfully.']);
    }
}
