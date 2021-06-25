<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use View;

class DashboardController extends Controller {

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the dashboard. Data is loaded async.
     *
     * @return mixed
     */
    public function index()
    {
        return View::make('admin.dashboard.index');
    }
}