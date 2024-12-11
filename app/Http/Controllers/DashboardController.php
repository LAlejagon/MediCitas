<?php

namespace App\Http\Controllers;

use App\Models\DoctorInfo;
use App\Models\User;
use App\Models\Specialty;
use App\Models\Date;
use App\Models\Schedule;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of users and specialties.
     */
    public function index()
    {
        $users = User::paginate(5);
        $specialties = Specialty::paginate(5);
        $doctorsInfo = DoctorInfo::paginate(5);
        $dates = Date::paginate(5);
        $schedules = Schedule::paginate(5);

        return view('modules.index', compact('users', 'specialties', 'doctorsInfo', 'dates', 'schedules'));
    }
}