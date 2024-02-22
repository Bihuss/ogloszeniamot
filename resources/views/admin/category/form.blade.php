{{--<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    <label for="parent_id" class="control-label">{{ 'Parent Id' }}</label>
    <input class="form-control" name="parent_id" type="number" id="parent_id" value="{{ isset($category->parent_id) ? $category->parent_id : ''}}" >
    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>--}}
<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Parent_id' }}</label>
    <select name="parent_id" id="">
        <option value=""></option>
        @include('item.categoryTreeSelect',$parentCategories);
    </select>
    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($category->name) ? $category->name : ''}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
