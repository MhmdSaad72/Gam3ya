<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ '*الاسم' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($student->name) ? $student->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('father_name') ? 'has-error' : ''}}">
    <label for="father_name" class="control-label">{{ '*اسم اﻷب' }}</label>
    <input class="form-control" name="father_name" type="text" id="father_name" value="{{ isset($student->father_name) ? $student->father_name : old('father_name')}}" >
    {!! $errors->first('father_name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mother_name') ? 'has-error' : ''}}">
    <label for="mother_name" class="control-label">{{ '*اسم اﻷم' }}</label>
    <input class="form-control" name="mother_name" type="text" id="mother_name" value="{{ isset($student->mother_name) ? $student->mother_name : old('mother_name')}}" >
    {!! $errors->first('mother_name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('national_id') ? 'has-error' : ''}}">
    <label for="national_id" class="control-label">{{ 'الرقم القومي' }}</label>
    <input class="form-control" name="national_id" type="text" id="national_id" value="{{ isset($student->national_id) ? $student->national_id : old('national_id')}}" >
    {!! $errors->first('national_id', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('father_national_id') ? 'has-error' : ''}}">
    <label for="father_national_id" class="control-label">{{ 'الرقم القومي للأب' }}</label>
    <input class="form-control" name="father_national_id" type="text" id="father_national_id" value="{{ isset($student->father_national_id) ? $student->father_national_id : old('father_national_id')}}" >
    {!! $errors->first('father_national_id', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mother_national_id') ? 'has-error' : ''}}">
    <label for="mother_national_id" class="control-label">{{ 'الرقم القومي للأم' }}</label>
    <input class="form-control" name="mother_national_id" type="text" id="mother_national_id" value="{{ isset($student->mother_national_id) ? $student->mother_national_id : old('mother_national_id')}}" >
    {!! $errors->first('mother_national_id', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('birth_date') ? 'has-error' : ''}}">
    <label for="birth_date" class="control-label">{{ 'تاريخ الميلاد' }}</label>
    <input class="form-control" name="birth_date" type="date" id="birth_date" value="{{ isset($student->birth_date) ? $student->birth_date : old('birth_date')}}" >
    {!! $errors->first('birth_date', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('school') ? 'has-error' : ''}}">
    <label for="school" class="control-label">{{ 'المدرسة' }}</label>
    <input class="form-control" name="school" type="text" id="school" value="{{ isset($student->school) ? $student->school : old('school')}}" >
    {!! $errors->first('school', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('band') ? 'has-error' : ''}}">
    <label for="band" class="control-label">{{ 'الفرقة' }}</label>
    <input class="form-control" name="band" type="text" id="band" value="{{ isset($student->band) ? $student->band : old('band')}}" >
    {!! $errors->first('band', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('register') ? 'has-error' : ''}}">
    <label for="register" class="control-label">{{ 'اثبات قيد' }}</label>
    <input class="form-control" name="register" type="file" id="register" value="{{ isset($student->register) ? $student->register : old('register')}}" >
    {!! $errors->first('register', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
