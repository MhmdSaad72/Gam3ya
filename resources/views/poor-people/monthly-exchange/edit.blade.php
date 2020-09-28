@extends('adminlte::page')

@section('title', 'تعديل الصرف الشهري')

@section('content_header')
    <h1>تعديل الصرف الشهري</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/poor-people/monthly-exchange') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        @if (session('error'))
                            <ul class="alert alert-danger">
                                {{session('error')}}
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/poor-people/monthly-exchange/' . $monthlyexchange->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('year') ? 'has-error' : ''}}">
                              <label for="year" class="control-label">السنة</label>
                              <select name="year" class="form-control" id="year" >
                                  <option value="{{$thisYear}}" selected>{{$thisYear}}</option>

                              </select>
                              {!! $errors->first('year', '<p class="help-block text-danger">:message</p>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('month') ? 'has-error' : ''}}">
                                <label for="month" class="control-label">الشهر</label>
                                <select name="month" class="form-control" id="month" >
                                  <option value="" selected disabled>اختر الشهر</option>
                                  @for ($i=1; $i <= 12; $i++)
                                    <option value="{{$i}}"{{$monthlyexchange->getMonthAttribute($i) == $monthlyexchange->month ? 'selected': ''}}>{{$monthlyexchange->getMonthAttribute($i)}}</option>
                                  @endfor

                            </select>
                                {!! $errors->first('month', '<p class="help-block text-danger">:message</p>') !!}
                            </div>


                            @include ('poor-people.monthly-exchange.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
