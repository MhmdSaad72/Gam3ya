@extends('adminlte::page')

@section('title', 'تعديل الطفل')

@section('content_header')
    <h1>تعديل الطفل</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/nursery/children') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/nursery/children/' . $child->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            @include ('nursery.children.form', ['formMode' => 'edit'])

                            <div class="form-group {{ $errors->has('social_status') ? 'has-error' : ''}}">
                                <label for="social_status" class="control-label">{{ '*الحالة الاجتماعية' }}</label>
                                <select name="social_status" class="form-control" id="social_status" >
                                    <option selected disabled> اختر الحالة الاجتماعية</option>
                                    <option value="0"{{$child->social_status == '0' ? 'selected': ''}}>أعزب</option>
                                    <option value="1"{{$child->social_status == '1' ? 'selected': ''}}>متزوج</option>
                                    <option value="2"{{$child->social_status == '2' ? 'selected': ''}}>مطلق</option>
                            </select>
                                {!! $errors->first('social_status', '<p class="help-block text-danger">:message</p>') !!}
                            </div>
                            <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
                                <label for="type" class="control-label">{{ '*النوع' }}</label>
                                <select name="type" class="form-control" id="type" >
                                    <option selected disabled>اختر النوع</option>
                                    <option value="0"{{$child->type == '0' ? 'selected': ''}}>ذكر</option>
                                    <option value="1"{{$child->type == '1' ? 'selected': ''}}>انثي</option>
                            </select>
                                {!! $errors->first('type', '<p class="help-block text-danger">:message</p>') !!}
                            </div>


                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="{{'تحديث'}}">
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
