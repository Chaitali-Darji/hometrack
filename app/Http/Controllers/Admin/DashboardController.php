<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use View;

class DashboardController extends Controller {

    protected $user;
    protected $client;
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Client $client)
    {
        $this->middleware('auth');
        $this->user = $user;
        $this->client = $client;
    }

    /**
     * Show the dashboard. Data is loaded async.
     *
     * @return mixed
     */
    public function index()
    {
        $counts['users'] = $this->user->count();
        $counts['clients'] = $this->client->count();
        return View::make('admin.dashboard.index',compact('counts'));
    }
}