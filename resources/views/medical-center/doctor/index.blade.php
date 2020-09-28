@extends('adminlte::page')

@section('title', 'اﻷطباء')

@section('content_header')
<h1>اﻷطباء</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <a href="{{ url('/medical-center/doctor/create') }}" class="btn btn-success btn-sm" title="Add New Doctor">
            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
          </a>

          <form method="GET" action="{{ url('/medical-center/doctor') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="بحث..." value="{{ request('search') }}">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>

          <br />
          <br />
          @if (session('flash_message'))
              <ul class="alert alert-success">
                  {{session('flash_message')}}
              </ul>
          @endif
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>الاسم</th>
                  <th>التخصص</th>
                  <th>الراتب</th>
                  <th>انشئت ف</th>
                  <th>الاجراءات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($doctor as $item)
                <tr>
                  <td>{{ ($doctor ->currentpage()-1) * $doctor ->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->specialization }}</td>
                  <td>{{ $item->salary }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>
                    <a href="{{ url('/medical-center/doctor/' . $item->id) }}" title="View Doctor"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> عرض</button></a>
                    <a href="{{ url('/medical-center/doctor/' . $item->id . '/edit') }}" title="Edit Doctor"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>
                    <a href="{{ route('doctor.dates' , $item->id) }}" title="add dates"><button class="btn btn-info btn-sm"> اضافة مواعيد</button></a>
                    @if ($item->dates->count() > 0)
                      <a href="{{ route('doctor.all.dates' , $item->id) }}" title="Edit dates"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل المواعيد</button></a>
                    @endif

                    <form method="POST" action="{{ url('/medical-center/doctor' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Doctor" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $doctor->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
