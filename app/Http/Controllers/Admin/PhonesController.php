<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Phone;
use Illuminate\Support\Facades\DB;

class PhonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$phones = Phone::all();
        //return view('admin.phones.index', compact('phones'));

        $data = DB::table('phone')
        ->join('manufacturer', 'manufacturer.id', '=', 'phone.manufacturer_id')
        ->select('phone.*', 'manufacturer.name as m_name')
        ->get();
        return view('admin.phones.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.phones.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1',
            'storage' => 'required|numeric',
            'price' => 'required|numeric',
            'manufacturer_id' => 'required|numeric',
            'phone_photo' => 'nullable|image|max:2048'
        ],[
            'name.required' => 'Name is required.',
            'name.min:2' => 'Name is to short',
            'storage.required' => 'Storage is required.',
            'storage.numeric' => 'Only numbers!',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Only numbers!',
            'manufacturer_id.required' => 'Manufacturer is required!',
            'manufacturer_id.numeric' => 'Only numbers!',
            'phone_photo.image' => 'Only images!'
        ]);

        $data = $request->all();
        if ($request->hasFile('phone_photo')) {
            $fileName = time().'.'.$request->phone_photo->extension(); // failo pavadinimas pvz. 1620283915.jpg
            $request->phone_photo->move(public_path('uploads/phones'), $fileName); // failas bus išsaugotas kataloge ..\library\public\uploads
            $data['phone_photo'] = $fileName;
        }



        Phone::create($data);
        //Phone::create($request->all());
        return redirect('admin/phones')->with('success', 'Phone added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phone = Phone::findOrFail($id);  // įvykdoma SQL užklausa, kuri išrenka vieną įrašą iš lentelės pagal ID reikšmę
        return view('admin.phones.show', compact('phone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phone = Phone::findOrFail($id);
        return view('admin.phones.form', compact('phone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:1',
            'storage' => 'required|numeric',
            'price' => 'required|numeric',
            'manufacturer_id' => 'required|numeric',
            'phone_photo' => 'nullable|image|max:2048'
        ],[
            'name.required' => 'Name is required.',
            'name.min:2' => 'Name is to short',
            'storage.required' => 'Storage is required.',
            'storage.numeric' => 'Only numbers!',
            'price.required' => 'Price is required.',
            'price.numeric' => 'Only numbers!',
            'manufacturer_id.required' => 'Manufacturer is required!',
            'manufacturer_id.numeric' => 'Only numbers!',
            'phone_photo.image' => 'Only images!'
        ]);

        $data = $request->all();
        $phone = Phone::findOrFail($id);

        if ($request->hasFile('phone_photo')) {
            @unlink(public_path('uploads/phones/').$phone->phone_photo);
            $fileName = time().'.'.$request->phone_photo->extension(); // failo pavadinimas pvz. 1620283915.jpg
            $request->phone_photo->move(public_path('uploads/phones'), $fileName); // failas bus išsaugotas kataloge ..\library\public\uploads
            $data['phone_photo'] = $fileName;
        }


        $phone -> update($data);

        $phone = Phone::findOrFail($id);
        //$phone->update($request->all());   // įvykdoma SQL užklausa, kuri atnaujina duomenis DB
        return redirect('admin/phones')->with('success', 'Phone updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phone = Phone::findOrFail($id);
        $phone->delete();  // įvykdoma SQL užklausa, kuri pašalina duomenis iš DB
        return redirect('admin/phones')->with('success', 'Phone deleted successfully.');
    }
}
