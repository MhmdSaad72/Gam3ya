<div class="form-group {{ $errors->has('place') ? 'has-error' : ''}}">
    <label for="place" class="control-label">{{ '*المكان' }}</label>
    <input class="form-control" name="place" type="text" id="place" value="{{ isset($device->place) ? $device->place : old('place')}}" >
    {!! $errors->first('place', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('person') ? 'has-error' : ''}}">
    <label for="person" class="control-label">{{ '*الشخص' }}</label>
    <input class="form-control" name="person" type="text" id="person" value="{{ isset($device->person) ? $device->person : old('person')}}" >
    {!! $errors->first('person', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('entry_date') ? 'has-error' : ''}}">
    <label for="entry_date" class="control-label">{{ '*تاريخ الدخول' }}</label>
    <input class="form-control" name="entry_date" type="date" id="entry_date" value="{{ isset($device->entry_date) ? $device->entry_date : old('entry_date')}}" >
    {!! $errors->first('entry_date', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('exit_date') ? 'has-error' : ''}}">
    <label for="exit_date" class="control-label">{{ '*تاريخ الخروج' }}</label>
    <input class="form-control" name="exit_date" type="date" id="exit_date" value="{{ isset($device->exit_date) ? $device->exit_date : old('exit_date')}}" >
    {!! $errors->first('exit_date', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
