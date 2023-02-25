<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
        //     ->whereYear('created_at', date('Y'))
        //     ->groupBy(DB::raw("Month(created_at)"))
        //     ->pluck('count', 'month_name');
        // $labels = $users->keys();
        // $data = $users->values();

        // return view('home', compact('labels', 'data'));
        return view('dashboard');
    }
    public function handleAdmin()
    {
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');
        $labels = $users->keys();
        $data = $users->values();

        $pedidos = Pedido::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');
        $labelsPedidos = $pedidos->keys();
        $dataPedidos = $pedidos->values();

        return view('home', compact('labels', 'data','labelsPedidos','dataPedidos'));
        // return view('handleAdmin');
    }
}
