<?php

namespace App\Exports;

use App\Models\Dawis;
use Maatwebsite\Excel\Concerns\FromCollection;

class DawisExport implements FromCollection
{
    public function collection()
    {
        return Dawis::all();
    }
}
