<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\liquor_mg;
class keepbottleController extends Controller
{
    public function index(){
        $liquors=liquor_mg::select('liquor_id','liquor_name')->get();
        return view('keepbottle-list',compact('liquors'));
    }
}
