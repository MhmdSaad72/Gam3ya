@extends('adminlte::page')

@section('title', 'اضافة اﻷسرة')

@section('content_header')
    <h1>اضافة اﻷسرة</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/disabled/family-details') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/disabled/family-details') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            {{-- <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
                                <label for="category_id" class="control-label">الفئات</label>
                                <select name="category_id" class="form-control" id="category_id" >
                                  <option value="" selected disabled>اختر الفئة</option>
                                  @foreach($categories as $category)
                                    <option value="{{$category->id}}"{{$category->id == old('category_id') ? 'selected': ''}}>{{$category->name}}</option>
                                  @endforeach

                            </select>
                                {!! $errors->first('category_id', '<p class="help-block text-danger">:message</p>') !!}
                            </div> --}}

                            @include ('disabled.family-details.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
