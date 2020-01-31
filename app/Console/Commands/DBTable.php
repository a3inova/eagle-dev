<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DBTable
{
    public function exists($table)
    {
        return \Illuminate\Support\Facades\Schema::hasTable($table);
    }

    public function showDetails($table)
    {
        if (!exist($table)) {
            return $this->warn("Atenção: Tabela não encontrada.");
        }

        $columns = \Illuminate\Support\Facades\DB::select("DESC {$table}");

        $headers = [
            'Field', 'Type', 'Null', 'Key', 'Default', 'Extra',
        ];

        $rows = collect($columns)->map(function ($column) {
            return get_object_vars($column);
        });

        return $this->table($headers, $rows);
    }
}
