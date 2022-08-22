<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Phone;

class PhonesChooseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {


        $data = DB::table('phone')
            ->join('manufacturer', 'manufacturer.id', '=', 'phone.manufacturer_id')
            ->select('phone.id as pid','phone.name','phone.storage', 'phone.price', 'manufacturer.name as m_name')
            ->get()->sortBy('m_name');


        return view('user.phone_choose', compact('data'));
    }

    public function addPhone(Request $request, $pid){
        //$userID = Auth::user()->id;
        DB::update(
            'update users set phone_id = '.$pid.' where id = ?',
            [Auth::user()->id]
        );

        $data = DB::table('phone')
            ->join('manufacturer', 'manufacturer.id', '=', 'phone.manufacturer_id')
            ->select('phone.id as pid','phone.name','phone.storage', 'phone.price', 'manufacturer.name as m_name')
            ->get()->where('pid', $pid);


        return view('user.phone_reserved', compact('data'));
    }

    public function checkPhones(Request $request){

        $data = DB::table('phone')
            ->join('manufacturer', 'manufacturer.id', '=', 'phone.manufacturer_id')
            ->select('phone.id as pid','phone.name','phone.storage', 'phone.price', 'manufacturer.name as m_name')
            ->get()->where('pid', Auth::user()->phone_id);


        return view('user.phone_owned', compact('data'));
    }
}
