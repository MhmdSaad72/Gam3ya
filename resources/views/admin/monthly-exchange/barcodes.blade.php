@extends('adminlte::page')

@section('title', 'الباركود')

@section('content_header')
    <h1>الباركود</h1>
@stop

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-9 ml-3">
              <div class="card">
                  <div class="card-body">
                    <a href="{{ url('/admin/monthly-exchange/family-details/' . $monthlyexchange->id) }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
                    <br />
                    <br />
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </ul>
                    @endif
                    @if (session('error'))
                      <div class="alert alert-danger">
                        {{session('error')}}
                      </div>
                    @endif
                    @if (session('message'))
                      <div class="alert alert-success">
                        {{session('message')}}
                      </div>
                    @endif
                    <h1>فحص الباركود</h1>
                     <form class="" action="{{route('check.barcode' , ['id' => $monthlyexchange->id])}}" method="post">
                       {{csrf_field()}}
                       <div class="form-group">
                         <input type="text" name="barcode" value="{{old('barcode')}}" @if (Session::has('autofocus')) autofocus @endif>
                       </div>
                       <div class="form-group">
                           <input class="btn btn-primary" type="submit" value="{{ 'فحص' }}">
                       </div>
                     </form>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection
