@extends('layouts.admin')

@section('title', 'Future Users')

@section('content')



    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <h1 style="text-align:center">Users that needs to be transferred to system:</h1>
                <table class="table table-sm table-bordered table-striped text-center table-hover" style="width: 1000px; margin-left:auto; margin-right:auto">
                    <thead class="thead-dark">
                    <tr>
                        <th class="w-25">ID</th>
                        <th class="w-25">Name</th>
                        <th class="w-25">Country</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item['id']}}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['country']}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
