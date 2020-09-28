<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ '*المبلغ' }}</label>
    <input class="form-control" name="price" type="text" id="price" value="{{ isset($incoming->price) ? $incoming->price : old('price')}}" >
    {!! $errors->first('price', '<p class="help-block text-danger">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('mosque_id') ? 'has-error' : ''}}">
    <label for="mosque_id" class="control-label">{{ '*المساجد' }}</label>
    <select name="mosque_id" class="form-control" id="mosque_id" >
      <option value="" selected disabled>اختر مسجد</option>
      @foreach($mosques as $mosque)
        @if (isset($incoming->mosque_id))
          <option value="{{$mosque->id}}"{{$mosque->id == $incoming->mosque_id ? 'selected': ''}}>{{$mosque->name}}</option>
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
