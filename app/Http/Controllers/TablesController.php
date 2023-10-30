<?php

namespace App\Http\Controllers;

use App\Models\Table;

class TablesController extends Controller
{
    function getTables() {
        $tables = Table::all()->pluck('id');
        
        return $tables;
    }
}
