<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ '*الاسم' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($doctor->name) ? $doctor->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('specialization') ? 'has-error' : ''}}">
    <label for="specialization" class="control-label">{{ '*التخصص' }}</label>
    <input class="form-control" name="specialization" type="text" id="specialization" value="{{ isset($doctor->specialization) ? $doctor->specialization : old('specialization')}}" >
    {!! $errors->first('specialization', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('salary') ? 'has-error' : ''}}">
    <label for="salary" class="control-label">{{ 'الراتب' }}</label>
    <input class="form-control" name="salary" type="number" id="salary" value="{{ isset($doctor->salary) ? $doctor->salary : old('salary')}}" >
    {!! $errors->first('salary', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
