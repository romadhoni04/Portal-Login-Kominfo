<?php

namespace App\Exports;


use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class UsersExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        return User::where('role', 'user')->get(['id', 'name', 'last_name', 'email', 'created_at'])->map(function ($user, $index) {
            return [
                'No' => $index + 1,
                'Nama Lengkap' => $user->full_name, // Pastikan ini sesuai dengan nama properti/metode
                'Email' => $user->email,
                'Tanggal Terdaftar' => $user->created_at->format('d M Y'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Lengkap',
            'Email',
            'Tanggal Terdaftar',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Set header style
        $sheet->getStyle('A1:D1')->getFont()->setBold(true);
        $sheet->getStyle('A1:D1')->getFont()->setSize(12);
        $sheet->getStyle('A1:D1')->getFont()->getColor()->setARGB(Color::COLOR_WHITE);
        $sheet->getStyle('A1:D1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $sheet->getStyle('A1:D1')->getFill()->getStartColor()->setARGB('007BFF');

        // Set alignment for the header
        $sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Set border for the entire table
        $sheet->getStyle('A1:D' . (User::where('role', 'user')->count() + 1))
            ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
    }
}
