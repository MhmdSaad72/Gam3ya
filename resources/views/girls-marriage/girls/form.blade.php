<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ '*الاسم' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($girl->name) ? $girl->name : old('name')}}" >
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('national_id') ? 'has-error' : ''}}">
    <label for="national_id" class="control-label">{{ '*الرقم القومي' }}</label>
    <input class="form-control" name="national_id" type="text" id="national_id" value="{{ isset($girl->national_id) ? $girl->national_id : old('national_id')}}" >
    {!! $errors->first('national_id', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'التليفون' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($girl->phone) ? $girl->phone : old('phone')}}" >
    {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('birth_date') ? 'has-error' : ''}}">
    <label for="birth_date" class="control-label">{{ '*تاريخ الميلاد' }}</label>
    <input class="form-control" name="birth_date" type="date" id="birth_date" value="{{ isset($girl->birth_date) ? $girl->birth_date : old('birth_date')}}" >
    {!! $errors->first('birth_date', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('marriage_date') ? 'has-error' : ''}}">
    <label for="marriage_date" class="control-label">{{ '*تاريخ الزواج' }}</label>
    <input class="form-control" name="marriage_date" type="date" id="marriage_date" value="{{ isset($girl->marriage_date) ? $girl->marriage_date : old('marriage_date')}}" >
    {!! $errors->first('marriage_date', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'نوع القسم' }}</label>
    <div class="radio">
    <label><input name="type" type="radio" value="1" {{ (isset($girl) && $girl->getTypeAttribute(1) == $girl->type) ? 'checked' : '' }}> فقراء</label>
</div>
<div class="radio">
    <label><input name="type" type="radio" value="0" @if (isset($girl)) {{ ($girl->getTypeAttribute(0) == $girl->type) ? 'checked' : '' }} @else {{ 'checked' }} @endif> أيتام</label>
</div>
    {!! $errors->first('type', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('case') ? 'has-error' : ''}}">
    <label for="case" class="control-label">{{ 'الحالة' }}</label>
    <div class="radio">
    <label><input name="case" type="radio" value="1" {{ (isset($girl) && $girl->getCaseAttribute(1) == $girl->case) ? 'checked' : '' }}> أكبر من 18</label>
</div>
<div class="radio">
    <label><input name="case" type="radio" value="0" @if (isset($girl)) {{ ($girl->getCaseAttribute(0) == $girl->case) ? 'checked' : '' }} @else {{ 'checked' }} @endif> أقل من 18</label>
</div>
    {!! $errors->first('case', '<p class="help-block text-danger">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'تحديث' : 'اضافة' }}">
</div>
