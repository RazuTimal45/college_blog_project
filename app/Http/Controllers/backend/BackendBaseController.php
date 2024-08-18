<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\backend\Contact;


class BackendBaseController extends Controller
{
    
    protected function __loadToView($file_path){
        View::composer($file_path, function ($view) {
            $view->with('panel',$this->panel);
            $view->with('base_route',$this->base_route);
            $view->with('base_view',$this->base_view);
            // $view->with('contacts', Contact::take(3)->get());
            // $view->with('contact_count',Contact::count());
        });
        return $file_path;
    }
}
