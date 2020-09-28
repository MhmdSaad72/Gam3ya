
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'العنوان' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($familydetail->address) ? $familydetail->address : old('address')}}" >
    {!! $errors->first('address', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'رقم التليفون' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($familydetail->phone) ? $familydetail->phone : old('phone')}}" >
    {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('care_number') ? 'has-error' : ''}}">
    <label for="care_number" class="control-label">{{ '*رقم الرعاية' }}</label>
    <input class="form-control" name="care_number" type="text" id="care_number" value="{{ isset($familydetail->care_number) ? $familydetail->care_number : old('care_number')}}" >
    {!! $errors->first('care_number', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('serial_number') ? 'has-error' : ''}}">
    <label for="serial_number" class="control-label">{{ 'رقم المسلسل' }}</label>
    <input class="form-control" name="serial_number" type="number" id="serial_number" value="{{ isset($familydetail->serial_number) ? $familydetail->serial_number : old('serial_number')}}" >
    {!! $errors->first('serial_number', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('father_name') ? 'has-error' : ''}}">
    <label for="father_name" class="control-label">{{ 'اسم اﻷب' }}</label>
    <input class="form-control" name="father_name" type="text" id="father_name" value="{{ isset($familydetail->father_name) ? $familydetail->father_name : old('father_name')}}" >
    {!! $errors->first('father_name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('father_national_id') ? 'has-error' : ''}}">
    <label for="father_national_id" class="control-label">{{ 'الرقم القومي للأب' }}</label>
    <input class="form-control" name="father_national_id" type="number" id="father_national_id" value="{{ isset($familydetail->father_national_id) ? $familydetail->father_national_id : old('father_national_id')}}" >
    {!! $errors->first('father_national_id', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mother_name') ? 'has-error' : ''}}">
    <label for="mother_name" class="control-label">{{ 'اسم اﻷم' }}</label>
    <input class="form-control" name="mother_name" type="text" id="mother_name" value="{{ isset($familydetail->mother_name) ? $familydetail->mother_name : old('mother_name')}}" >
    {!! $errors->first('mother_name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mother_national_id') ? 'has-error' : ''}}">
    <label for="mother_national_id" class="control-label">{{ 'الرقم القومي للأم' }}</label>
    <input class="form-control" name="mother_national_id" type="number" id="mother_national_id" value="{{ isset($familydetail->mother_national_id) ? $familydetail->mother_national_id : old('mother_national_id')}}" >
    {!! $errors->first('mother_national_id', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('host_name') ? 'has-error' : ''}}">
    <label for="host_name" class="control-label">{{ '*اسم العائل' }}</label>
    <input class="form-control" name="host_name" type="text" id="host_name" value="{{ isset($familydetail->host_name) ? $familydetail->host_name : old('host_name')}}" >
    {!! $errors->first('host_name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('host_image') ? 'has-error' : ''}}">
    <label for="host_image" class="control-label">{{ 'صورة العائل' }}</label>
    <input class="form-control" name="host_image" type="file" id="host_image" value="{{ isset($familydetail->host_image) ? $familydetail->host_image : old('host_image')}}" >
    {!! $errors->first('host_image', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('host_national_id') ? 'has-error' : ''}}">
    <label for="host_national_id" class="control-label">{{ 'الرقم القومي للعائل' }}</label>
    <input class="form-control" name="host_national_id" type="number" id="host_national_id" value="{{ isset($familydetail->host_national_id) ? $familydetail->host_national_id : old('host_national_id')}}" >
    {!! $errors->first('host_national_id', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('host_relationship') ? 'has-error' : ''}}">
    <label for="host_relationship" class="control-label">{{ 'صلة قرابة العائل' }}</label>
    <input class="form-control" name="host_relationship" type="text" id="host_relationship" value="{{ isset($familydetail->host_relationship) ? $familydetail->host_relationship : old('host_relationship')}}" >
    {!! $errors->first('host_relationship', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
