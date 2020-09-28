<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ '*الاسم' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($boy->name) ? $boy->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ '*التليفون' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($boy->phone) ? $boy->phone : old('phone')}}" >
    {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('details') ? 'has-error' : ''}}">
    <label for="details" class="control-label">{{ 'التفاصيل' }}</label>
    <textarea class="form-control" rows="5" name="details" type="textarea" id="details" >{{ isset($boy->details) ? $boy->details : old('details')}}</textarea>
    {!! $errors->first('details', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('teacher_id') ? 'has-error' : ''}}">
    <label for="teacher_id" class="control-label">المحفظ</label>
    <select name="teacher_id" class="form-control" id="teacher_id" >
      <option value="" selected disabled>اختر اسم المحفظ</option>
      @foreach($teachers as $teacher)
        @if (isset($boy->teacher_id))
          <option value="{{$teacher->id}}"{{$teacher->id == $boy->teacher_id ? 'selected': ''}}>{{$teacher->name}}</option>
        @else
          <option value="{{$teacher->id}}"{{$teacher->id == old('teacher_id') ? 'selected': ''}}>{{$teacher->name}}</option>
        @endif
      @endforeach
</select>
    {!! $errors->first('teacher_id', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
