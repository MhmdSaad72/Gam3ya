@extends('adminlte::page')

@section('title', 'اضافة طفل')

@section('content_header')
    <h1>اضافة طفل</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/poor-people/children') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/poor-people/children') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @include ('poor-people.children.form', ['formMode' => 'create'])

                            <div class="form-group {{ $errors->has('social_status') ? 'has-error' : ''}}">
                                <label for="social_status" class="control-label">{{ '*الحالة الاجتماعية' }}</label>
                                <select name="social_status" class="form-control" id="social_status" >
                                  <option disabled selected>اختر الحالة الاجتماعية</option>
                                  <option value="0"{{old('social_status') == '0' ? 'selected' : ''}}>أعزب</option>
                                  <option value="1"{{old('social_status') == '1' ? 'selected' : ''}}>متزوج</option>
                                  <option value="2"{{old('social_status') == '2' ? 'selected' : ''}}>مطلق</option>
                                </select>
                                {!! $errors->first('social_status', '<p class="help-block text-danger">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
                                <label for="type" class="control-label">{{ '*النوع' }}</label>
                                <select name="type" class="form-control" id="type" >
                                  <option disabled selected>اختر النوع</option>
                                  <option value="0" {{old('type') == '0' ? 'selected' : ''}}>ذكر</option>
                                  <option value="1" {{old('type') == '1' ? 'selected' : ''}}>انثي</option>
                                </select>
                                {!! $errors->first('type', '<p class="help-block text-danger">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('family_id') ? 'has-error' : ''}}">
                                <label for="family_id" class="control-label">{{ 'العائل' }}</label>
                                <select name="family_id" class="form-control" id="family_id" >
                                  <option value="" selected disabled>اختر العائل</option>
                                  @foreach($families as $family)
                                    <option value="{{$family->id}}"{{$family->id == old('family_id') ? 'selected': ''}}>{{$family->host_name}}</option>
                                  @endforeach

                            </select>
                                {!! $errors->first('family_id', '<p class="help-block text-danger">:message</p>') !!}
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
