<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class SearchController extends Controller
{
    public function index(Request $request)
    {


        if($request->search) {


            $opt  = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => TRUE,
            );
            $dsn = 'mysql:host=127.0.0.1;port=9306;';
            $pdo = new PDO($dsn, null, null, $opt);
            // dump($pdo);
            // $stmt = $pdo->query("SELECT * FROM index_employees");
            // dump($stmt);
            // // $stmt = $pdo->query("SELECT * FROM index_employees WHERE MATCH({$request->search})");
            //  $results = $stmt->fetchAll();
            // // dump($stmt);
            //  dump($results);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Ищем слово «курс» в индексе новостей
            // мануал: http://sphinxsearch.com/docs/manual-2.2.1.html#sphinxql-select
            $stmt = $pdo->query("SELECT * FROM index_employees WHERE MATCH('{$request->search}') ");
             $results = $stmt->fetchAll();
            dump($stmt);
            dump($results);

            // return redirect()->route('admin.employee.index');
        }
    }
}
