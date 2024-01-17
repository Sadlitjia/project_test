<?php


namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;

class AnswerExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    protected $answers;

    public function __construct($answers)
    {
        $this->answers = $answers;
    }

    public function collection()
    {
        return $this->answers;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Pengguna',
            'Pertanyaan',
            'Jawaban',
            'Tanggal',
        ];
    }

    public function map($answer): array
    {
        return [
            $answer->id,
            $answer->pengguna->nama,
            $answer->item_question->pertanyaan,
            $answer->jawaban,
            Carbon::parse($answer->tanggal)->format('Y-m-d'), // Menggunakan Carbon untuk memformat tanggal
        ];
    }
}


