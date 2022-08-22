@extends('layouts.app')

@section('title', 'Phones')

@section('content')


<h1 style="text-align:center"> Congratulations! You have reserved following phone:</h1>
 <h2 style="text-align:center">
     @foreach($data as $item)
        <tr>
            <td>{{ $item->m_name }}</td>
            <td>{{ $item->name }}</td>
        </tr>
    @endforeach
 </h2>
@endsection
