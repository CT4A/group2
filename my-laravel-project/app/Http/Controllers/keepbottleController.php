<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\liquor_link;
use Illuminate\Http\Request;
use App\Models\liquor_mg;
use Illuminate\Support\Facades\DB;
class keepbottleController extends Controller
{
    //キープボトル一覧。
    public function indexList(){

        // $liquors=liquor_link::select('liquor_id','liquor_name')->orderBy('liquor_id')->get();
        $liquors = liquor_link::leftJoin('liquor_mgs','liquor_links.liquor_id','=','liquor_mgs.liquor_id')
                                ->select('liquor_links.liquor_number','liquor_links.liquor_id','liquor_links.customer_id','liquor_mgs.liquor_type')
                                ->orderBy('liquor_type')
                                ->get();                            
        return view('keepbottle-list',compact('liquors'));
    }
    //編集画面表示
    public function indexEditor(Request $request){
        
        //顧客を選択したかどうか（urlを直接に入力する）
        if($request->has('customer_id')&&$request->has('liquor_id')&&$request->has('liquor_number')){
            $liquor_id=$request->liquor_id;
            $customer_id=$request->customer_id;
            $liquor_number=$request->liquor_number;
            
            $existsliquor = DB::table('liquor_links')->where([
                ['liquor_id', '=', $liquor_id],
                ['liquor_number', '=',$customer_id],   
                ['customer_id', '=', $liquor_number],
                ])->exists();
                
            //urlから受けたのIDは存在のチェック（urlに直接入力する防止）
            // if ($existsliquor) {
                $liquor = liquor_link::leftJoin('customers', 'customers.customer_id', '=', 'liquor_links.customer_id')
                                    ->leftJoin('liquor_mgs', 'liquor_mgs.liquor_id', '=', 'liquor_links.liquor_id')
                                    ->select('customers.customer_id','customers.customer_name','liquor_links.liquor_day','liquor_links.remarks','liquor_mgs.liquor_name','liquor_mgs.liquor_type')
                                    // ->where([
                                    //     ['liquor_links.liquor_id', '=', $liquor_id],
                                    //     ['liquor_links.liquor_number', '=',$customer_id],   
                                    //     ['customers.customer_id', '=', $liquor_number],
                                    //     ])
                                        ->where('liquor_links.liquor_id', '=', $liquor_id)
                                    ->first();
                $liquors=liquor_mg::select('liquor_name')->groupBy('liquor_name')->get();
                $customers = customer::select('customer_id','customer_name')->get();  
                return view('keepbottle-editor',compact('customers','liquors'));
            // } else {
            //     //存在してない場合顧客リストページに転送します。
            //     return redirect()->route('keepbottle-list');
            // }            
            // return view('keepbottle-editor',compact('customers'));
        }else{
            return back();
        }
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
    //キープボトルの詳細情報(各キープボトルをクリックする処理)
    public function GetInfoKeepBottle(Request $request){
        $liquorId = $request->input('liquor_id');
        $liquorNumber = $request->input('liquor_number');
        $customerId = $request->input('customer_id');
        $KeepbotleInfo = liquor_link::join('liquor_mgs', 'liquor_links.liquor_id', '=', 'liquor_mgs.liquor_id')
        ->join('customers', 'liquor_links.customer_id', '=', 'customers.customer_id')
        ->select('customers.customer_id','customers.customer_name','liquor_mgs.liquor_id','liquor_links.liquor_number','liquor_mgs.liquor_name','liquor_mgs.liquor_type','liquor_links.liquor_day','liquor_links.remarks')
        ->where([
            ['liquor_links.liquor_id', '=', $liquorId],
            ['liquor_links.liquor_number', '=',$liquorNumber],   
            ['customers.customer_id', '=', $customerId],
            ])
        ->first();
        return response()->json($KeepbotleInfo);
    }
}