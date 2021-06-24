<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use View;

class DashboardController extends Controller {

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
