@extends('adminlte::page')

@section('title', 'الاولاد')

@section('content_header')
    <h1>الاولاد</h1>
@stop


@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <a href="{{ url('/quran-memorization/boy/create') }}" class="btn btn-success btn-sm" title="Add New Boy">
            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
          </a>

          <form method="GET" action="{{ url('/quran-memorization/boy') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                  <th>التليفون</th>
                  <th>اسم المحفظ</th>
                  <th>التفاصيل</th>
                  <th>انشئت في</th>
                  <th>الاجراءات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($boy as $item)
                <tr>
                  <td>{{ ($boy ->currentpage()-1) * $boy ->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->phone }}</td>
                  <td>{{ $item->teacher->name ?? '' }}</td>
                  <td>{{ $item->details }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>
                    <a href="{{ url('/quran-memorization/boy/' . $item->id) }}" title="View Boy"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> عرض</button></a>
                    <a href="{{ url('/quran-memorization/boy/' . $item->id . '/edit') }}" title="Edit Boy"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>

                    <form method="POST" action="{{ url('/quran-memorization/boy' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger btn-sm" title="Delete Boy" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $boy->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
