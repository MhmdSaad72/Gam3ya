@extends('adminlte::page')

@section('title', 'البنات')

@section('content_header')
<h1>البنات</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <a href="{{ url('/girls-marriage/girls/create') }}" class="btn btn-success btn-sm" title="Add New Girl">
            <i class="fa fa-plus" aria-hidden="true"></i> اضافة جديد
          </a>

          <form method="GET" action="{{ url('/girls-marriage/girls') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                  <th>الرقم القومي</th>
                  <th>التليفون</th>
                  <th>انشئت في</th>
                  <th>الاجراءات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($girls as $item)
                <tr>
                  <td>{{ ($girls ->currentpage()-1) * $girls ->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->national_id }}</td>
                  <td>{{ $item->phone }}</td>
                  <td>{{ $item->created_at }}</td>
                  <td>
                    <a href="{{ url('/girls-marriage/girls/' . $item->id) }}" title="View Girl"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> عرض</button></a>
                    <a href="{{ url('/girls-marriage/girls/' . $item->id . '/edit') }}" title="Edit Girl"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>
                    <a href="{{ route('purchase.create' , $item->id)  }}" title="Add new purchase"><button class="btn btn-info btn-sm"> اضافة مشتريات</button></a>
                    @if ($item->purchases->count() != 0)
                      <a href="{{ route('purchase.show' , $item->id)  }}" title="edit purchases"><button class="btn btn-info btn-sm"> تعديل المشتريات</button></a>
                    @endif
                    @if ($item->purchases->count() == 0)
                      <form method="POST" action="{{ url('/girls-marriage/girls' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Girl" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                      </form>
                    @endif

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $girls->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
