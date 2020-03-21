<?php

use App\Employee;
use Illuminate\Database\Seeder;


class EmployeesTableSeeder extends Seeder
{

    public function run()
    {
        Employee::truncate();

        $this->fillEmployeeData();
        $this->generateTree();
    }

    /**
     *  Fill in employee data
     */
    protected function fillEmployeeData()
    {
        $record_count = config('tree.record_count');

        foreach (range(1, $record_count) as $index) {
            factory(Employee::class)->create();
            $message = "\e[32mSeeding: Filling in employee data";
            $this->cliIteratorMessage($message, $record_count, $index);
        }
        echo PHP_EOL;
    }

    /**
     * Generate tree
     */
    protected function generateTree()
    {
        $depth = config('tree.depth');
        $record_count = config('tree.record_count');
        $root_count = config('tree.root_count');
        $offset = 0;

        for($i = 0; $i <= $depth; $i++)
        {
            if($i == 0)
                $count = $root_count; // set the number of root elements to be created
            else{
                // we count the number of records per level (0.1 + 0.15 + 0.2 + 0.25 + 0.3)
                $calc = (0.5 * $i + 0.5) / 10;
                $count =  $calc * $record_count ;
            }

            $parent = App\Employee::all()->slice($offset, $count)->map(function($employee) use (&$parent, &$i, &$offset, &$record_count){

                $employee->depth = $i;

                if($offset){
                    $employee->appendToNode($parent->random())->save();
                }
                $offset++;

                $message = "\e[32mSeeding: Create a subordinate structure :";
                $this->cliIteratorMessage($message,  $record_count, $offset);

                return $employee;
            });
        }
        echo PHP_EOL;
    }

    /**
     * Show process fillable data
     * @param $message
     * @param int $total
     * @param int $current
     */
    protected function cliIteratorMessage($message, $total = 0, $current = 0)
    {
        echo "\033[61D";      // Move 5 characters backward
        $input = $message . " \e[39m " . $total . "/" . $current;
        $length = strlen($input);
        echo str_pad($input, $length, ' ', STR_PAD_LEFT);
    }
}
