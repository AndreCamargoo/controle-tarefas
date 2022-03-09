<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return Tarefa::all();
        return auth()->user()->tarefas()->get();
    }

    public function headings(): array
    {
        return ['Id', 'Tarefa', 'Data limite conclusão'];
    }

    public function map($rows): array
    {
        return [
            $rows->id,
            $rows->tarefa,
            date('d/m/Y', strtotime($rows->data_limite_conclusao))
        ];
    }
}