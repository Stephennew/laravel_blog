<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\Model\Member;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function memberIndex()
    {
        $data = Member::all();
        return view('member.index',['data'=>$data]);
    }

    public function memberAdd()
    {
        return view('member.add');
    }

    public function memberSave(Request $request)
    {

        $member = new Member();
        $member->name = $request->name;
        $member->telphone = $request->telphone;
        $member->email = $request->email;
        if(strlen($request->card)==18){
            $member->card = $request->card;
        }else{
            return '身份证号码尾数不够18位';
        }
        $member->brithday = substr($request->card,6,8);
        $member->signature = $request->signature;
        $member->intro = $request->intro;
        $member->save();
        return redirect(route('index'));
    }

    public function memberView(Request $request)
    {
        $member = Member::find($request->id);
        return view('member.view',['member'=>$member]);
    }

    public function memberEdit(Request $request)
    {
        $data = Member::where('id',$request->id)->first();
        return view('member.edit',['data'=>$data]);
    }

    public function memberUpdate(Request $request)
    {
        $arr = [
            'name'=>$request->name,
            'telphone'=>$request->telphone,
            'email'=>$request->email,
            'card'=>$request->card,
            'signature'=>$request->signature,
            'intro'=>$request->intro
        ];
        if(strlen($request->card)==18){
            $arr['card'] = $request->card;
        }else{
            return '身份证长度必须是18位';
        }
        //$arr['brithday']=substr($arr['card'],6,8);
        //第一种
        //preg_match('/^\d{6}(\d{8})\d{4}$/',$request->card,$bri);
        //preg_match('/^\d{6}(\d{4})(\d{2})(\d{2})\d{4}$/',$request->card,$bri);
        //$a = $bri[1].'-'.$bri[2].'-'.$bri[3];


        //第二种
        $replace = '$1-$2-$3';
        $arr['brithday'] = preg_replace('/^\d{6}(\d{4})(\d{2})(\d{2})\d{4}$/','\1-\2-\3',$request->card);

        Member::where('id',$request->id)->update($arr);

       /* if(strlen($request->card)==18){
            $card = $request->card;
        }else{
            return '身份证长度必须是18位';
        }
        $brithday = substr($card,6,8);
        Member::where('id',$request->id)
            ->update([
            'name'=>$request->name,
            'telphone'=>$request->telphone,
            'email'=>$request->email,
            'card'=>$card,
            'brithday'=>$brithday,
            'signature'=>$request->signature,
            'intro'=>$request->intro
        ]);*/
        return redirect(route('index'));
    }

    public function memberDel(Request $request)
    {
        Member::destroy($request->id);
        return redirect(route('index'));
    }


}
