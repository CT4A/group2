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
        $liquors=liquor_mg::select('liquor_type','liquor_id')
                        ->orderBy('liquor_type')
                        ->get();
        return view('list-bottle',compact('liquors'));
    }
    public function indexEditor(Request $request){
        if(!$request->has('liquor_id')){
            return redirect()->route('list-bottle');
        }else{
            $liquor_id=$request->liquor_id;
            $existsliquor = liquor_mg::where('liquor_id', '=', $liquor_id)
                            ->exists();
            if($existsliquor){
                $liquor = liquor_mg::where('liquor_id', '=', $liquor_id)
                            ->select('liquor_id','liquor_type','liquor_name')
                            ->first();
                return view('bottle-editor',compact('liquor'));
            }
        }
        return view('bottle-editor',compact('liquors'));
    }
    
    // 編集処理
    public function editor(Request $request){
        
        $validatedData = $request->validate([
            'liquor_id' => 'required',
            'liquor_type' => 'required',
            'liquor_name' => 'required'
        ],[
            'liquor_type.required'=>'リストから選択してください。ないの場合はその他を選択して手入力してください。',
            'liquor_name.required'=>'酒名を入力してください。',
        ]);
        $liquor_id = $request->liquor_id;
        $liquor_type =$request->liquor_type;
        $test = liquor_mg::where('liquor_id', $liquor_id)->update(['liquor_type'=>$liquor_type]);
        //アップデート成功のチェック
        if ($test > 0) {
            return redirect()->route('list-bottle')->with('message','登録完成しました。');
        } else {
            return back('list-customer');
        }
    } 
    public function GetInfoBottle(Request $request){
            $id = $request->input("id");
            $bottleInfo = DB::table("liquor_mgs")
                    ->select('*')
                    ->where('liquor_id',$id)
                    ->get();
        return response()->json($bottleInfo);
        
    }
}

