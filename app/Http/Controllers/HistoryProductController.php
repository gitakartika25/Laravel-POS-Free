<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryProductController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
         $this->middleware(function($request, $next){
 		if(Gate::allows('admin-display')) return $next($request);
 		abort(403, 'Anda tidak memiliki cukup hak akses');
 });
    }
}
