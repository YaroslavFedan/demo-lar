<?php

use App\Employee;
use Illuminate\Database\Seeder;
use App\Console\ConsoleMessageTrait;

class EmployeesTreeBuildSeeder extends Seeder
{
    use ConsoleMessageTrait;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $depth = config('employee.depth');
        $record_count = config('employee.record_count');
        $root_count = config('employee.root_count');
        $parent = null;
        $offset = 0;

        $data = App\Employee::all();

        for($i = 0; $i <= $depth; $i++)
        {
            if($i == 0)
                $count = $root_count; // set the number of root elements to be created
            else{
                // we count the number of records per level (0.1 + 0.15 + 0.2 + 0.25 + 0.3)
                $calc = (0.5 * $i + 0.5) / 10;
                $count =  $calc * $record_count ;
            }

            $employees = $data->slice($offset, $count);

            foreach ($employees as $key=>$employee){

                if($offset && !$employee->parent_id){

                    $employee->depth = $i;
                    $root = $parent->random();
                    $root->appendNode($employee);

                    if(!(bool)$root->children_exist){
                        $root->children_exist = 1;
                        $root->save();
                    }

                    $message = "\e[32mSeeding: Create a subordinate structure :";
                    $this->processShow($message, $record_count, $employee->id);
                }

                $offset++;
            }
            $parent = $employees;
        }
        echo PHP_EOL;
    }
}
