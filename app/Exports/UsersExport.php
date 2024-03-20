<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UsersExport implements FromCollection, ShouldAutoSize, WithColumnFormatting, WithHeadings, WithMapping
{
    /**
     * Get the data collection to export.
     *
     * @return Collection<int, User> The collection of user data to be exported.
     */
    public function collection(): Collection
    {
        return User::all();
    }

    /**
     * Define the headings for the Excel file.
     *
     * @return array<string> An array of headings for the Excel columns.
     */
    public function headings(): array
    {
        return [
            'Id',
            'Nome',
            'Email',
            'Ruolo',
            'Data inserimento',
            'Data ultima modifica',
        ];
    }

    /**
     * Map the user data to an array for export.
     *
     * @param  User  $user  The user object to be mapped.
     * @return array<int, int|string|null> An array representing the user data for export.
     */
    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->getRoleName(),
            $user->created_at->format('d/m/Y'),
            $user->updated_at->format('d/m/Y'),
        ];
    }

    /**
     * Define custom column formats for specific Excel columns.
     *
     * @return array<string, string> An array where the keys represent column letters (e.g., 'A', 'B') and the values are Excel number format codes.
     */
    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'F' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
