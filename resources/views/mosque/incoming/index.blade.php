@extends('adminlte::page')

@section('title', 'حساب وارد')

@section('content_header')
    <h1>حساب وارد</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <a href="{{ url('/mosque/incoming/create') }}" class="btn btn-success btn-sm" title="Add New Incoming">
            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
          </a>

          <form method="GET" action="{{ url('/mosque/incoming') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                  <th>المسجد</th>
                  <th>انشئت في</th>
                  <th>الاجراءات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($incoming as $item)
                <tr>
                  <td>{{ ($incoming ->currentpage()-1) * $incoming ->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $item->price }}</td>
                  <td>{{ $item->mosque->name }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>
                    <a href="{{ url('/mosque/incoming/' . $item->id . '/edit') }}" title="Edit Incoming"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>

                    <form method="POST" action="{{ url('/mosque/incoming' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Incoming" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $incoming->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
