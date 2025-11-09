<?php
// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\LembagaDesa;
use App\Models\Rw;
use App\Models\Rt;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalWarga' => Warga::count(),
            'totalLembaga' => LembagaDesa::count(),
            'totalRw' => Rw::count(),
            'totalRt' => Rt::count(),
        ];

<<<<<<< HEAD
        return view('layouts.admin.dashboard', $data);
=======
        return view('pages.admin.dashboard', $data);
>>>>>>> 8c3c1d42a26caacfcc4638c5d88e7c1d654465bc
    }
}
