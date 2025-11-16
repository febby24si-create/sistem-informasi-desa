<?php
// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Warga;
use App\Models\LembagaDesa;
use Illuminate\Http\Request;
use App\Models\PerangkatDesa;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalWarga' => Warga::count(),
            'totalLembaga' => LembagaDesa::count(),
            'totalRw' => Rw::count(),
            'totalRt' => Rt::count(),
            'totalPerangkat' => PerangkatDesa::count(),
        ];

        return view('layouts.admin.dashboard', $data);
    }
}
