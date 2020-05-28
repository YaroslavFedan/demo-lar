<?php


namespace App\Http\View\Composers;


use App\Position;
use Illuminate\View\View;

class PositionsComposer
{
    public function compose(View $view)
    {
        $view->with(['positions'=>Position::all()]);
    }
}
