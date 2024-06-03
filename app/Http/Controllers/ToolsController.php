<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolsController extends Controller
{
    function amperToVa()
    {
        return view('appro.modul_tools.amper-to-va', array('title' => 'Appro Tools - Amper To VA'));
    }

    function amperToWatt()
    {
        return view('appro.modul_tools.amper-to-watt', array('title' => 'Appro Tools - Amper To Watt'));
    }

    function btuToWatt()
    {
        return view('appro.modul_tools.btu-to-watt', array('title' => 'Appro Tools - Btu To Watt'));
    }
    function acKalkulator()
    {
        return view('appro.modul_tools.ac-kalkulator', array('title' => 'Appro Tools - AC Kalkulator'));
    }
    function kvaAmpere()
    {
        return view('appro.modul_tools.kva-to-amper', array('title' => 'Appro Tools - kVa to Ampere'));
    }
    function energyKalkulator()
    {
        return view('appro.modul_tools.energy-kalkulator', array('title' => 'Appro Tools - Energy Kalkulator'));
    }
}
