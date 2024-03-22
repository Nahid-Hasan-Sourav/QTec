<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;


class DashboardController extends Controller
{
    public function index(){
        $userId = auth()->user()->id;
        $allNotecount = Note::where('user_id',$userId)->count();

        return view('dashboard.index',compact('allNotecount'));
    }
}
