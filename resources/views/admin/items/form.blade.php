<!-- User ID -->
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User ID' }}</label>
    <input class="form-control" name="user_id" type="text" id="user_id" value="{{ isset($item->user_id) ? $item->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>

<!-- Category ID -->
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    <label for="category_id" class="control-label">{{ 'Category ID' }}</label>
    <input class="form-control" name="category_id" type="text" id="category_id" value="{{ isset($item->category_id) ? $item->category_id : ''}}" >
    {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>

<!-- Title -->
<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Title' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($item->title) ? $item->title : ''}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<!-- Desc -->
<div class="form-group {{ $errors->has('desc') ? 'has-error' : ''}}">
    <label for="desc" class="control-label">{{ 'Opis' }}</label>
    <textarea id="desc" name="desc" rows="4" cols="50" class="form-control" type="textarea" >{{ isset($item->desc) ? $item->desc : ''}}</textarea>
    {!! $errors->first('desc', '<p class="help-block">:message</p>') !!}
</div>

<!-- Location -->
<div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="control-label">{{ 'Location' }}</label>
    <input class="form-control" name="location" type="text" id="location" value="{{ isset($item->location) ? $item->location : ''}}" >
    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
</div>

<!-- Mail -->
<div class="form-group {{ $errors->has('mail') ? 'has-error' : ''}}">
    <label for="mail" class="control-label">{{ 'Mail' }}</label>
    <input class="form-control" name="mail" type="text" id="mail" value="{{ isset($item->mail) ? $item->mail : ''}}" >
    {!! $errors->first('mail', '<p class="help-block">:message</p>') !!}
</div>

<!-- Phone -->
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($item->phone) ? $item->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>

<!-- Price -->
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($item->price) ? $item->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<!-- Type -->
<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($item->type) ? $item->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>

<!-- Brand -->
<div class="form-group {{ $errors->has('brand') ? 'has-error' : ''}}">
    <label for="brand" class="control-label">{{ 'Brand' }}</label>
    <input class="form-control" name="brand" type="text" id="brand" value="{{ isset($item->brand) ? $item->brand : ''}}" >
    {!! $errors->first('brand', '<p class="help-block">:message</p>') !!}
</div>

<!-- Fuel -->
<div class="form-group {{ $errors->has('fuel') ? 'has-error' : ''}}">
    <label for="fuel" class="control-label">{{ 'Fuel' }}</label>
    <input class="form-control" name="fuel" type="text" id="fuel" value="{{ isset($item->fuel) ? $item->fuel : ''}}" >
    {!! $errors->first('fuel', '<p class="help-block">:message</p>') !!}
</div>

<!-- Mileage -->
<div class="form-group {{ $errors->has('mileage') ? 'has-error' : ''}}">
    <label for="mileage" class="control-label">{{ 'Mileage' }}</label>
    <input class="form-control" name="mileage" type="text" id="mileage" value="{{ isset($item->mileage) ? $item->mileage : ''}}" >
    {!! $errors->first('mileage', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('active') ? 'has-error' : ''}}">
    <label for="active" class="control-label">{{ 'Active' }}</label>
    <div class="radio">
        <label><input name="active" type="radio" value="1" {{ (isset($item) && 1 == $item->active) ? 'checked' : '' }}> Yes</label>
    </div>
    <div class="radio">
        <label><input name="active" type="radio" value="0" @if (isset($item)) {{ (0 == $item->active) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
    </div>
    {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="Update">
</div>
