@extends('adminlte::page')

@section('title', ' اﻷساسيات')

@section('content_header')
    <h1> اﻷساسيات</h1>
@stop

@section('content')
  @if ($basic)

  <div class="container">
      <div class="row">
          <div class="col-md-9">
              <div class="card">
                  <div class="card-body">

                      <a href="{{ url('/poor-people/basic/' . $basic->id . '/edit') }}" title="Edit Basic"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>

                      <br/>
                      <br/>
                      @if (session('flash_message'))
                          <ul class="alert alert-success">
                              {{session('flash_message')}}
                          </ul>
                      @endif

                      <div class="table-responsive">
                          <table class="table">
                              <tbody>
                                  <tr>
                                    <th> اضافة </th><td> {{ $basic->addetion }} </td>
                                  </tr>
                                  <tr>
                                    <th> كفالة </th><td> {{ $basic->guarantee }} </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </div>
@endif
@endsection
