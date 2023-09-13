<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\liquor_link;
use Illuminate\Http\Request;
use App\Models\liquor_mg;
class keepbottleController extends Controller
{
    //キープボトル一覧。
    public function indexList(){
        $liquors=liquor_mg::select('liquor_id','liquor_name')->orderBy('liquor_id')->get();
        return view('keepbottle-list',compact('liquors'));
    }
    
    //キープボトル登録。
    public function indexRegister(){
        $customers= customer::select('customer_id','customer_name')->get();
        $liquors=liquor_mg::select('liquor_type')->groupBy('liquor_type')->get();
        return view('keepbottle-register',compact('liquors','customers'));
    }

    //キープボトルタイプをゲットする
    public function GetLiquorType(Request $request){
        if($request->ajax()){
            $liquor_type = $request->liquor_type;
            
            $liquorNames=liquor_mg::select('liquor_id','liquor_name')->where('liquor_type',$liquor_type)->get();

        return response()->json($liquorNames);
        }
    }

    // キープボトル登録
    public function RegisterLiquorLink(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'liquor_id' => 'required',
            'liquor_type' => 'required',
            'liquor_day' => 'required',
        ],[
            'customer_id.required'=>'リストからスタッフの名前を選択してください。',
            'liquor_id.required'=>'リストからスタッフの名前を選択してください。ないの場合は顧客新規登録してください',
            'liquor_type.required'=>'リストからお酒の種類を選択してください。',
            'liquor_day.required'=>'日付を入力してください。'            
        ]);
        $liquor = liquor_mg::find(  $request->liquor_id);
        $NewLiquor_number = $liquor->liquor_number + 1;

        liquor_link::create([
            'customer_id' => $request->customer_id,
            'liquor_id'=>$request->liquor_id,
            'liquor_number' => $NewLiquor_number,
            'liquor_day' => $request->liquor_day,
            'remarks' => $request->remarks
        ]);
        $liquor->liquor_number = $NewLiquor_number;
        $liquor->save();
        return redirect()->route('indexKeepRegister')->with('message','登録完成しました。');
    }

    public function GetInfoKeepBottle(Request $request){
        if($request->ajax()){
            $id = $request->id;
            
            $KeepbotleInfo = customer::leftJoin('employees','employees.staff_id','=','customers.staff_id')
                                    ->select('customers.customer_id','customers.customer_name','customers.birthday','customers.company_name','customers.staff_id','employees.staff_name')
                                    ->where('customer_id',$id)
                                    ->get();
            return response()->json($KeepbotleInfo);
        }
    }
}