<?php

namespace App\Imports;

use App\Models\Variabel;
use PhpOffice\PhpSpreadsheet\IOFactory;

class VariabelImport implements \PhpOffice\PhpSpreadsheet\Reader\IReadFilter
{
    public function model(array $row)
    {
        return new Variabel([
            'no' => $row['NO'],
            'nama_ruas' => $row['NAMA RUAS'],
            'panjang_ruas' => $row['Panjang Ruas'],
            'pr_tidak_mantap' => $row['P.R tidak mantap'], // Tambahkan kolom ini
            'variabel1' => $row['VARIABEL 1'],
            'variabel2' => $row['VARIABEL 2'],
            'variabel3' => $row['VARIABEL 3'],
            'variabel4' => $row['VARIABEL 4'],
            'variabel5' => $row['VARIABEL 5'],
            'total' => $row['TOTAL'],
        ]);
    }

    public function readCell($column, $row, $worksheetName = ''): bool
    {
        return true;
    }
}
