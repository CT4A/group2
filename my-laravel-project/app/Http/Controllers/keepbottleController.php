<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;
use App\Models\liquor_mg;
class keepbottleController extends Controller
{
    //キープボトル一覧。
    public function indexList(){
        $liquors=liquor_mg::select('liquor_id','liquor_name')->get();
        return view('keepbottle-list',compact('liquors'));
    }
    
    //キープボトル登録。
    public function indexRegister(){
        $customers= customer::select('customer_id','customer_name')->get();
        $companys= customer::select('customer_id','company_name')->get();
        $liquors=liquor_mg::select('liquor_name')->groupBy('liquor_name')->get();
        // return view('test',compact('liquors','customers','companys'));

        return view('keepbottle-register',compact('liquors','customers','companys'));
    }
    public function GetLiquorType(Request $request){
        if($request->ajax()){
            $liquor_name = $request->liquor_name;
            
            $liquorTypes=liquor_mg::select('liquor_id','liquor_type')->where('liquor_name',$liquor_name)->get();

        return response()->json($liquorTypes);
        }
    }
}
