@extends('adminlte::page')

@section('title', 'الموظفين')

@section('content_header')
<h1>الموظفين</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <a href="{{ url('/nursery/employee/create') }}" class="btn btn-success btn-sm" title="Add New Employee">
            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
          </a>

          <form method="GET" action="{{ url('/nursery/employee') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
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
                  <th>التليفون</th>
                  <th>الرقم القومي</th>
                  <th>الوظيفة</th>
                  <th>انشئت ف</th>
                  <th>الاجراءات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($employee as $item)
                <tr>
                  <td>{{ ($employee ->currentpage()-1) * $employee ->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->phone }}</td>
                  <td>{{ $item->national_id }}</td>
                  <td>{{ $item->job }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>
                    <a href="{{ url('/nursery/employee/' . $item->id) }}" title="View Employee"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> عرض</button></a>
                    <a href="{{ url('/nursery/employee/' . $item->id . '/edit') }}" title="Edit Employee"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>

                    <form method="POST" action="{{ url('/nursery/employee' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $employee->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
