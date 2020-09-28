@extends('adminlte::page')

@section('title', 'المواعيد')

@section('content_header')
<h1>المواعيد</h1>
@stop

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">
          <a href="{{ url('/quran-memorization/teacher') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>


          <br />
          <br />
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>اليوم</th>
                  <th>الوقت</th>
                  <th>الاجراءات</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dates as $item)
                <tr>
                  <td>{{ ($dates ->currentpage()-1) * $dates ->perpage() + $loop->index + 1 }}</td>
                  <td>{{ $item->days }}</td>
                  <td>{{ Carbon\Carbon::parse($item->time)->format('h:i A') }}</td>
                  <td>
                    <a href="{{ route('update.dates' , $item->id) }}" title="Edit Teacher"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل</button></a>


                      <form method="POST" action="{{ route('destroy.date', $item->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Date" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> حذف</button>
                      </form>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $dates->appends(['search' => Request::get('search')])->render() !!} </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
