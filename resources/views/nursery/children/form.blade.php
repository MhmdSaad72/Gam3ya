<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ '*الاسم' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($child->name) ? $child->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('birth_date') ? 'has-error' : ''}}">
    <label for="birth_date" class="control-label">{{ '*تاريخ الميلاد' }}</label>
    <input class="form-control" name="birth_date" type="date" id="birth_date" value="{{ isset($child->birth_date) ? $child->birth_date : old('birth_date')}}" >
    {!! $errors->first('birth_date', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('national_id') ? 'has-error' : ''}}">
    <label for="national_id" class="control-label">{{ '*الرقم القومي' }}</label>
    <input class="form-control" name="national_id" type="text" id="national_id" value="{{ isset($child->national_id) ? $child->national_id : old('national_id')}}" >
    {!! $errors->first('national_id', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('academic_year') ? 'has-error' : ''}}">
    <label for="academic_year" class="control-label">{{ '*السنة الدراسية' }}</label>
    <input class="form-control" name="academic_year" type="text" id="academic_year" value="{{ isset($child->academic_year) ? $child->academic_year : old('academic_year')}}" >
    {!! $errors->first('academic_year', '<p class="help-block text-danger">:message</p>') !!}
</div>
