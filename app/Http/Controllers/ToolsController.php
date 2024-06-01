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
}
