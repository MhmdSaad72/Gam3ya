@extends('adminlte::page')

@section('title', 'المحفظ')

@section('content_header')
<h1>المحفظ</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <a href="{{ url('/quran-memorization/teacher/create') }}" class="btn btn-success btn-sm" title="Add New Teacher">
            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
          </a>

          <form method="GET" action="{{ url('/quran-memorization/teacher') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                  <th>المسجد</th>
                  <th>عدد اﻷولاد</th>
                  <th>انشئت في</th>
                  <th>الاجراءات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($teacher as $item)
                <tr>
                  <td>{{ ($teacher ->currentpage()-1) * $teacher ->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->phone }}</td>
                  <td>{{ $item->mosque }}</td>
                  <td>{{ $item->boys->count() }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>
                    <a href="{{ url('/quran-memorization/teacher/' . $item->id) }}" title="View Teacher"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> عرض</button></a>
                    <a href="{{ url('/quran-memorization/teacher/' . $item->id . '/edit') }}" title="Edit Teacher"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>
                    <a href="{{ route('teacher.dates' , $item->id) }}" title="add dates"><button class="btn btn-info btn-sm"> اضافة مواعيد</button></a>
                    @if ($item->dates->count() > 0)
                      <a href="{{ route('edit.dates' , $item->id) }}" title="Edit dates"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل المواعيد</button></a>
                    @endif

                    @if ($item->boys->count() == 0)
                      <form method="POST" action="{{ url('/quran-memorization/teacher' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Teacher" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                      </form>
                    @endif

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $teacher->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
