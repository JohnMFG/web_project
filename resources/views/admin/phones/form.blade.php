@extends('layouts.admin')

@section('title', 'Phones')

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($phone))
                    Edit exist phone
                @else
                    Create new phone
                @endif
            </h6>
        </div>
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="card-body">

            {{-- Form::model ir Form::open metodai automatiškai prideda prie formos CSRF žetoną, todėl atskirai jo aprašyti nereikia --}}
            @if(isset($phone))
                {{-- Eamo įrašo redagavimo forma --}}
                {!! Form::model($phone, ['url' => ['admin/phones', $phone->id], 'method' => 'patch', 'enctype'=>'multipart/form-data']) !!}
            @else
                {{-- Naujo įrašo įvedimo forma; metodo nereikia nurodyti, nes pagal nutylėjimą jis yra 'post' --}}
                {!! Form::open(['url' => 'admin/phones', 'enctype'=>'multipart/form-data']) !!}
            @endif

            <div class="form-group">
                {!! Form::label('name', 'Name: ', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('storage', 'Storage', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('storage', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('price', 'Price', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('manufacturer_id', 'Manufacturer ID', ['class' => 'col-sm-3']) !!}
                <div class="col-sm-6">
                    {!! Form::text('manufacturer_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>
            </div>
            <div class="form-group col-sm-6">
                <div class="custom-file">
                    {!! Form::label('phone_photo', 'Upload phone image', ['class' => 'custom-file-label'.($errors->has('phone_photo') ? ' is-invalid' : '')]) !!}
                    {!! Form::file('phone_photo', ['class' => 'custom-file-input']) !!}
                    <script>
                        $(".custom-file-input").on("change", function (){
                            var fileName = $(this).val().split("\\").pop();
                            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                        });
                    </script>
                </div>
                @if(isset($phone->phone_photo))
                    <img src="{{ url('uploads/phones', $phone->phone_photo) }}" height="100" class="mt-2">
                @endif
                {!! $errors->first('phone_photo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
