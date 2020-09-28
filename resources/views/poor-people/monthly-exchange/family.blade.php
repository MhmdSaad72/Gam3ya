@extends('adminlte::page')

@section('title', 'بيانات تكلفة العائلات')

@section('content_header')
    <h1>بيانات تكلفة العائلات</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                      <a href="{{ url('/poor-people/monthly-exchange') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
                      <a href="{{ url('poor-people/monthly-exchange/family/excel?id=' . $monthlyexchange->id) }}" title=""><button class="btn btn-success btn-sm"> اكسل</button></a>
                      <a href="{{ url('/poor-people/monthly-exchange/barcodes/' . $monthlyexchange->id) }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> صرف بالباركود</button></a>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>العائل</th>
                                        <th>العنوان</th>
                                        <th>التكلفة</th>
                                        <th>الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($families as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->host_name }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->familyCost() }}</td>
                                        <td>
                                          @if ($item->checked($item->id , $monthlyexchange->id) == 1)
                                            <i class="fas fa-check-square"></i>
                                          @else
                                            <form method="POST" action="{{ url('/poor-people/monthly-exchange/family' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                              {{ csrf_field() }}
                                              <input type="hidden" name="monthly_id" value="{{$monthlyexchange->id}}">
                                              <button type="submit" class="btn btn-success btn-sm" title="" onclick="return confirm(&quot;تأكيد الصرف&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> صرف</button>
                                            </form>
                                          @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="pagination-wrapper"> {!! $relativeexchange->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
