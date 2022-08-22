@extends('layouts.app')

@section('title', 'Phones')

@section('content')



    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <h1 style="text-align:center">Your reserved/purchased phones:</h1>
                <table class="table table-sm table-bordered table-striped text-center table-hover" style="width: 1000px; margin-left:auto; margin-right:auto">
                    <thead class="thead-dark">
                    <tr>
                        <th class="w-25">Manufacturer</th>
                        <th class="w-25">Name</th>
                        <th class="w-25">Storage (GB)</th>
                        <th class="w-25">Price (EUR)</th>
                        <th class="w-25">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->m_name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->storage }}</td>
                            <td>{{ $item->price }}</td>
                            <td> Reserved </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
