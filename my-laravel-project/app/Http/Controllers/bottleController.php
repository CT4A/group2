<?php

namespace App\Http\Controllers;

use App\Models\liquor_mg;
use App\Models\liquor_link;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class bottleController extends Controller
{
    public function index()
    {
        $liquors=liquor_mg::select('liquor_type')->groupBy('liquor_type')->get();
        return view('bottle-register',compact('liquors'));
    }
    public function RegisterBottle(Request $request)
    {
        $validatedData = $request->validate([
            'liquor_type' => 'required',
            'liquor_name' => 'required'
        ],[
            'liquor_type.required'=>'リストから選択してください。ないの場合はその他を選択して手入力してください。',
            'liquor_name.required'=>'酒名を入力してください。',
        ]);
        liquor_mg::create([
            'liquor_type' => $request->liquor_type,
            'liquor_name'=>$request->liquor_name,
            'remarks' => $request->remarks
        ]);
        return redirect()->route('indexRegister')->with('message','登録完成しました。');
    }
    public function indexList(){
        $liquors=liquor_mg::select('liquor_name','liquor_type','liquor_id')
                        ->orderBy('liquor_id')
                        ->get();
        return view('list-bottle',compact('liquors'));
    }
    public function GetInfoBottle(Request $request){
        if($request->ajax()){
            $id = $request->id;
            // $id = 2;
            $bottleInfo = DB::table("liquor_mgs")
            ->join('liquor_links','liquor_mgs.liquor_id','=','liquor_links.liquor_id')
            ->join('customers','liquor_links.customer_id','=','customers.customer_id')
            ->select('liquor_mgs.liquor_name','liquor_mgs.liquor_id','liquor_mgs.liquor_type','liquor_links.liquor_day','liquor_links.remarks','customers.customer_name')
            ->where('liquor_mgs.liquor_id',$id)
            ->get();
        return response()->json($bottleInfo);
        }
    }
}

