@extends('adminlte::page')

@section('title', 'المشتريات')

@section('content_header')
<h1>المشتريات</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <a href="{{ url('/girls-marriage/girls') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>

          <form method="GET" action="{{ route('purchase.show' , $girl->id) }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>الاسم</th>
                  <th>الكود</th>
                  <th>النوع</th>
                  <th>السعر</th>
                  <th>التفاصيل</th>
                  <th>انشئت في</th>
                  <th>الاجراءات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($purchases as $item)
                <tr>
                  <td>{{ ($purchases ->currentpage()-1) * $purchases ->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->code }}</td>
                  <td>{{ $item->type }}</td>
                  <td>{{ $item->price }}</td>
                  <td>{{ $item->details }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>
                    <a href="{{ route('purchase.edit' , $item->id) }}" title="Edit purchase"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $purchases->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
