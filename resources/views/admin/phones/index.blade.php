@extends('layouts.admin')

@section('title', 'Phones')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('admin/phones/create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Add phone</a>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Storage</th>
                        <th>Price</th>
                        <th>Manufacturer</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item) {{-- iš valdiklio gavom autorių masyvą $authors; kadangi tai masyvas, reikia jį išskaidyti elementais --}}
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->storage }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->m_name }}</td>
                        <td>
                            <a href="{{ url('admin/phones/'.$item->id.'/edit') }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="{{ url('admin/phones/'.$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i> View</a>
                            {!! Form::open(['method'=>'DELETE', 'url' => ['admin/phones', $item->id], 'style' => 'display:inline']) !!}
                            {!! Form::button('<i class="fas fa-trash-alt"></i> Delete', ['class' => 'btn btn-danger btn-sm', 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
