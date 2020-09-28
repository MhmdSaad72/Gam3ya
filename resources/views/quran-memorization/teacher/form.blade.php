<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ '*الاسم' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($teacher->name) ? $teacher->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ '*التليفون' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($teacher->phone) ? $teacher->phone : old('phone')}}" >
    {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mosque') ? 'has-error' : ''}}">
    <label for="mosque" class="control-label">{{ 'المسجد' }}</label>
    <input class="form-control" name="mosque" type="text" id="mosque" value="{{ isset($teacher->mosque) ? $teacher->mosque : old('mosque')}}" >
    {!! $errors->first('mosque', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('rewards') ? 'has-error' : ''}}">
  <label for="rewards" class="control-label">{{ 'مكافآت' }}</label>
  <input class="form-control" name="rewards" type="text" id="rewards" value="{{ isset($teacher->rewards) ? $teacher->rewards : old('rewards')}}" >
  {!! $errors->first('rewards', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
