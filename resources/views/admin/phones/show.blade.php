@extends('layouts.admin')

@section('title', 'Phones')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('/admin/phones/'.$phone->id.'/edit') }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit phone</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $phone->id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $phone->name }}</td>
                    </tr>
                    <tr>
                        <td>Storage</td>
                        <td>{{ $phone->storage }}</td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>{{ $phone->price }}</td>
                    </tr>
                    <tr>
                        <td>Manufacturer ID</td>
                        <td>{{ $phone->manufacturer_id}}</td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td><img src="{{ url('uploads/phones', $phone->phone_photo) }}" height="100" class="mt-2"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
