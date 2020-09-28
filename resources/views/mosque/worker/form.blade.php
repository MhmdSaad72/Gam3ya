<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ '*الاسم' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($worker->name) ? $worker->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ '*التليفون' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($worker->phone) ? $worker->phone : old('phone')}}" >
    {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('job') ? 'has-error' : ''}}">
    <label for="job" class="control-label">{{ 'الوظيفة' }}</label>
    <input class="form-control" name="job" type="text" id="job" value="{{ isset($worker->job) ? $worker->job : old('job')}}" >
    {!! $errors->first('job', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('salary') ? 'has-error' : ''}}">
    <label for="salary" class="control-label">{{ 'الراتب' }}</label>
    <input class="form-control" name="salary" type="text" id="salary" value="{{ isset($worker->salary) ? $worker->salary : old('salary')}}" >
    {!! $errors->first('salary', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mosque_id') ? 'has-error' : ''}}">
    <label for="mosque_id" class="control-label">{{ '*المساجد' }}</label>
    <select name="mosque_id" class="form-control" id="mosque_id" >
      <option value="" selected disabled>اختر مسجد</option>
      @foreach($mosques as $mosque)
        @if (isset($worker->mosque_id))
          <option value="{{$mosque->id}}"{{$mosque->id == $worker->mosque_id ? 'selected': ''}}>{{$mosque->name}}</option>
        @else
          <option value="{{$mosque->id}}"{{$mosque->id == old('mosque_id') ? 'selected': ''}}>{{$mosque->name}}</option>
        @endif
      @endforeach

</select>
    {!! $errors->first('mosque_id', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
