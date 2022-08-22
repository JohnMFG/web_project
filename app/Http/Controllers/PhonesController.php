<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Phone;

class PhonesController extends Controller
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
            ->select('phone.name','phone.storage', 'phone.price', 'manufacturer.name as m_name')
            ->get()->sortBy('m_name');
        return view('user.phone_models', compact('data'));
    }
}
