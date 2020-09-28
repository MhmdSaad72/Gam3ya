@extends('adminlte::page')

@section('title', 'تعديل الصرف العيني')

@section('content_header')
    <h1>تعديل الصرف العيني</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/poor-people/relative-exchange') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/poor-people/relative-exchange/' . $relativeexchange->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('unit') ? 'has-error' : ''}}">
                                <label for="unit" class="control-label">{{ '*الوحدة' }}</label>
                                <select name="unit" class="form-control" id="unit" >
                                    <option selected disabled>اختر الوحدة</option>
                                    <option value="0"{{$relativeexchange->unit == '0' ? 'selected': ''}}>قطعة</option>
                                    <option value="1"{{$relativeexchange->unit == '1' ? 'selected': ''}}>كيلو</option>
                            </select>
                                {!! $errors->first('unit', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('distribution_type') ? 'has-error' : ''}}">
                                <label for="distribution_type" class="control-label">{{ '*نوع التوزيع' }}</label>
                                <select name="distribution_type" class="form-control" id="distribution_type" >
                                    <option selected disabled>اختر نوع التوزيع</option>
                                    <option value="0"{{$relativeexchange->distribution_type == '0' ? 'selected': ''}}>عائلة</option>
                                    <option value="1"{{$relativeexchange->distribution_type == '1' ? 'selected': ''}}>طفل</option>
                                    <option value="2"{{$relativeexchange->distribution_type == '2' ? 'selected': ''}}>اﻷطفال + 1</option>
                            </select>
                                {!! $errors->first('distribution_type', '<p class="help-block text-danger">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
                                <label for="category_id" class="control-label">*الفئات</label>
                                <select name="category_id" class="form-control" id="category_id" >
                                  <option value="" selected disabled>اختر الفئة</option>
                                  @foreach($categories as $category)
                                    <option value="{{$category->id}}"{{$category->id == $relativeexchange->category_id ? 'selected': ''}}>{{$category->name}}</option>
                                  @endforeach

                            </select>
                                {!! $errors->first('category_id', '<p class="help-block text-danger">:message</p>') !!}
                            </div>

                            @include ('poor-people.relative-exchange.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
