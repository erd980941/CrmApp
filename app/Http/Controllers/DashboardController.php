<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Customer;
use App\Models\Interaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboard()
    {
        

                $interactions = Interaction::with(['customer', 'user'])
        ->where('interaction_date', '>', now()) // Şimdiki tarihten sonraki etkileşimler
        ->orderBy('interaction_date', 'asc') // Tarihe göre sırala
        ->paginate(10); // Sadece 10 kayıt getir
        $stats = [
            'total_users' => User::count(),
            'active_users' => User::where('status', 'active')->count(),
            'pending_tasks' => Task::where('status', 'pending')->count(),
            'customers' => Customer::count(),
            'completed_tasks' => Task::where('status', 'completed')->count(),
            'system_status' => 'active',
        ];
    
        return view('dashboard', compact('stats','interactions'));
    }

    //FOR API
    public function getStats()
    {
        return response()->json([
            'total_users' => User::count(),
            'active_users' => User::where('status', 'active')->count(),
            'pending_tasks' => Task::where('status', 'pending')->count(),
            'system_status' => 'active',
        ]);
    }

    public function getStatusCounts()
{
    $data = [
        'completed' => Task::where('status', 'completed')->count(),
        'in_progress' => Task::where('status', 'in_progress')->count(),
        'pending' => Task::where('status', 'pending')->count(),
    ];

    return response()->json($data);
}
}
