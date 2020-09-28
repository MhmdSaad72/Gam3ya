@extends('adminlte::page')

@section('title', 'الكشوفات')

@section('content_header')
<h1>الكشوفات</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <a href="{{ route('nursery-accounts.create') }}" class="btn btn-success btn-sm" title="Add New Income">
            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
          </a>

          <form method="GET" action="{{ route('nursery-accounts.index') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                  <th>المبلغ</th>
                  <th>اسم المريض</th>
                  <th>اسم الطبيب</th>
                  <th>التاريخ</th>
                  <th>انشئت ف</th>
                  <th>الاجراءات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($nursery_accounts as $item)
                <tr>
                  <td>{{ ($nursery_accounts ->currentpage()-1) * $nursery_accounts ->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $item->amount }}</td>
                  <td>{{ $item->patient_name }}</td>
                  <td>{{ $item->doctor_name }}</td>
                  <td>{{ $item->date }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>
                    <a href="{{ route('nursery-accounts.show' , $item->id) }}" title="View Income"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> عرض</button></a>
                    <a href="{{ route('nursery-accounts.edit' , $item->id) }}" title="Edit Income"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>

                    <form method="POST" action="{{ url('/nursery/nursery-accounts' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Income" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $nursery_accounts->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
