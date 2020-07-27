<?php

namespace App\Observers;

use App\Employee;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmployeeObserver
{

    /**
     * Handle the employee "creating" event.
     *
     * @param Employee $employee
     * @throws \Throwable
     */
    public function creating(Employee $employee)
    {
//        if(Auth::check()){
//
//            DB::beginTransaction();
//
//            try{
//
//                if(request()->has('photo')){
//                    $employee->photo = $this->makePhoto(request()->photo);
//                }
//
//                $employee->admin_created_id = Auth::user()->id;
//                $employee->admin_updated_id = Auth::user()->id;
//
//                $parent = Employee::findOrFail($employee->parent_id);
//                $parent->children_exist = 1;
//                $parent->save();
//                $employee->depth = ++$parent->depth;
//
//                DB::commit();
//
//            }catch(\Exception $e){
//                Log::info('Creating employee fail',['message'=>$e->getMessage()]);
//                DB::rollback();
//            }
//        }
    }


    /**
     * Handle the employee "updated" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function updating(Employee $employee)
    {

//        $this->rebuildTree($employee);
//        dd($employee);

//        if(Auth::check()){
//            DB::beginTransaction();
//
//            try{
//                if(request()->has('photo')){
//                    $this->removePhoto($employee->id);
//                    $employee->photo = $this->makePhoto(request()->photo);
//                }
//
//                $employee->admin_updated_id = Auth::user()->id;
//                $this->rebuildTree($employee);
//
//                DB::commit();
//
//            }catch (\Exception $e){
//                Log::info('Updating employee fail',['message'=>$e->getMessage()]);
//                DB::rollback();
//            }
//        }
    }

    /**
     * Handle the employee "deleted" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function deleted(Employee $employee)
    {
        //
    }

    /**
     * Handle the employee "restored" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function restored(Employee $employee)
    {
        //
    }

    /**
     * Handle the employee "force deleted" event.
     *
     * @param  \App\Employee  $employee
     * @return void
     */
    public function forceDeleted(Employee $employee)
    {
        //
    }


    protected function removePhoto($employee_id)
    {
//        $imageName = Employee::findOrFail($employee_id)->photo;
//
//        if($imageName){
//            $path = public_path($imageName);
//            if(file_exists($path)){
//                unlink($path);
//            }
//        }
    }

    protected function makePhoto($photo)
    {
//        $imageName = time() . '-' .$photo->getClientOriginalName();
//        $image_path = config('image.path').$imageName;
//
//        \Image::make($photo)->resize(300, 300)->save($image_path, 80);
//
//        return $imageName;
    }




    protected function rebuildTree($employee)
    {

//         dump($employee->toArray());
//         $employee_before = Employee::findOrFail(6);
//
//
//         if($this->hasMoved($employee)){
//
////             $this->updateOldParent($employee_before);
////             $parent = $this->setNewParent($employee);
//
//             dump('query',[
//
//                 'before'=>$employee->getOriginal('parent_id'),
//                 'moved'=>true,
//                 'employee'=>$employee,
////                 'new parent'=>$parent->toArray()
//             ]);
//
//         }else{
//             dump('query',[
//                 'before'=>$employee->getOriginal('parent_id'),
//                 'employee'=>$employee,
//                 'moved'=>false
//             ]);
//         }























//
//        if($employee_before->parent_id !== $employee->parent_id) {
//            dump('moved');
//            $this->updateOldParent($employee_before);
//            // выставляем новому родителю children_exist в 1.
//            $parent = $this->setNewParent($employee);
//
//            $tree = Employee::descendantsOf($parent->id);//$employee->id
//
//            dump($tree);
//
////            $traverse = function ($employees) use (&$traverse) {
////                foreach ($employees as $employee) {
////
////                    dump($employee);
////
////                    $traverse($employee->children);
////                }
////            };
////
////            $traverse($tree);
//        }



//          dd($employee->toArray());
//
        /*
                // если изменился родитель
                if($employee_before->parent_id !== $employee->parent_id) {

                    $this->updateOldParent($employee_before);

                    // выставляем новому родителю children_exist в 1.
                    $new_parent = Employee::findOrFail($employee->parent_id);
                    $new_parent->children_exist = 1;
                    $new_parent->save();


        //            dump('new parent',[
        //                $new_parent->toArray()
        //            ]);
        //
        //
        //
        //            // выставляем текущему работнику уровень относительно нового родителя
        //            $employee->depth = ++$new_parent->depth;
        //            dump('employee depth',[
        //                $employee->depth
        //            ]);
        //            // находим у текущего работника всех наследников
        //            // и меняем их уровень относительно текущего
        //            $depth = ($employee_before->depth - $employee->depth);
        //            dump("depth",[ $depth ]);
        //
        ////            $childrens = Employee::whereDescendantOf($employee)->get();
        ////
        ////            foreach ($childrens as $children){
        ////                $children->depth += $depth;
        ////                dump('employee children',[
        ////                    $children->toArray()
        ////                ]);
        ////            }
        //
        //            Employee::whereDescendantOf($employee)->each(function($e) use($depth){
        //                $e->depth += $depth;
        //                dump('employee children',[
        //                    $e->toArray()
        //                ]);
        //                $e->save();
        //            });

                }*/
    }

    protected function hasMoved($employee){
//        return ($employee->getOriginal('parent_id') != $employee->parent_id);
    }


    protected function setNewParent($employee)
    {
//        $parent = Employee::findOrFail($employee->parent_id);
//        $parent->children_exist = 1;
////        $parent->save();
//
//        return $parent;
    }

    protected function updateOldParent($employee)
    {
//        $parent = $employee->parent()->first();
//        $cnt_children = $parent->children()->count();
//
//        if($cnt_children == 1){
//            $parent->children_exist = 0;
//            $parent->save();
//        }
    }
}
