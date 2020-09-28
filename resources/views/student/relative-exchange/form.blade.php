<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">{{ '*المبلغ' }}</label>
    <input class="form-control" name="amount" type="text" id="amount" value="{{ isset($relativeexchange->amount) ? $relativeexchange->amount : old('amount')}}" >
    {!! $errors->first('amount', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('reason') ? 'has-error' : ''}}">
    <label for="reason" class="control-label">{{ '*السبب' }}</label>
    <textarea class="form-control" rows="5" name="reason" type="textarea" id="reason" >{{ isset($relativeexchange->reason) ? $relativeexchange->reason : old('reason')}}</textarea>
    {!! $errors->first('reason', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('student_id') ? 'has-error' : ''}}">
    <label for="student_id" class="control-label">*الطلاب</label>
    <select name="student_id" class="form-control" id="student_id" >
      <option value="" selected disabled>اختر طالب</option>
      @foreach($students as $student)
        @if (isset($relativeexchange->student_id))
          <option value="{{$student->id}}"{{$student->id == $relativeexchange->student_id ? 'selected': ''}}>{{$student->name}}</option>
        @else
          <option value="{{$student->id}}"{{$student->id == old('student_id') ? 'selected': ''}}>{{$student->name}}</option>
        @endif
      @endforeach
</select>
    {!! $errors->first('student_id', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
