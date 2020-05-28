<?php

use App\Employee;
use Illuminate\Database\Seeder;
use App\Console\ConsoleMessageTrait;

class EmployeesTableSeeder extends Seeder
{
    use ConsoleMessageTrait;

    public function run()
    {
        Employee::truncate();

        $record_count = config('employee.record_count');

        foreach (range(1, $record_count) as $index) {
            factory(Employee::class)->create();

            $message = "\e[32mSeeding: Filling in employee data";
            $this->processShow($message, $record_count, $index);
        }
        $this->messageShow();
    }

}
