@extends('adminlte::page')

@section('title', 'اضافة مواعيد')

@section('content_header')
    <h1>اضافة مواعيد</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/medical-center/doctor') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('doctor.dates' , $doctor->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('days') || $errors->has('time') ? 'has-error' : ''}}">
                              <label for="days" class="control-label">{{ 'اليوم' }}</label>
                              <select name="days" class="form-control" id="days" >
                                <option value="" selected disabled>اختر اليوم</option>
                                @for ($i = 1 ; $i <= 7 ; $i++) <option value="{{$i}}" {{$i == old('days') ? 'selected': ''}}>{{$doctor->getDaysAttribute($i)}}</option>
                                  @endfor
                              </select>
                              {!! $errors->first('days', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('time') ? 'has-error' : ''}}">
                              <label for="time" class="control-label">{{ 'الوقت' }}</label>
                              <input class="form-control" name="time" type="time" id="time" value="{{old('time')}}">
                              {!! $errors->first('time', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="{{ 'اضافة' }}">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
