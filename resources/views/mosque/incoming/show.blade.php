@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">

    <div class="col-md-9">
      <div class="card">
        <div class="card-body">

          <a href="{{ url('/mosque/incoming') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> رجوع</button></a>
          <a href="{{ url('/mosque/incoming/' . $incoming->id . '/edit') }}" title="Edit Incoming"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

          <form method="POST" action="{{ url('mosque/incoming' . '/' . $incoming->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Delete Incoming" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
          </form>
          <br />
          <br />

          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <th> المبلغ </th>
                  <td> {{ $incoming->price }} </td>
                </tr>
                <tr>
                  <th> المسجد </th>
                  <td> {{ $incoming->mosque->name }} </td>
                </tr>
                <tr>
                  <th> انشئت في </th>
                  <td> {{ $incoming->created_at }} </td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
