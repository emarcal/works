<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">{{ 'Type' }}</label>
    <input class="form-control" name="type" type="text" id="type" value="{{ isset($doc->type) ? $doc->type : ''}}" >
    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('doc_id') ? 'has-error' : ''}}">
    <label for="doc_id" class="control-label">{{ 'Doc Id' }}</label>
    <input class="form-control" name="doc_id" type="file" id="doc_id" value="{{ isset($doc->doc_id) ? $doc->doc_id : ''}}" >
    {!! $errors->first('doc_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('doc_address') ? 'has-error' : ''}}">
    <label for="doc_address" class="control-label">{{ 'Doc Address' }}</label>
    <input class="form-control" name="doc_address" type="file" id="doc_address" value="{{ isset($doc->doc_address) ? $doc->doc_address : ''}}" >
    {!! $errors->first('doc_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user') ? 'has-error' : ''}}">
    <label for="user" class="control-label">{{ 'User' }}</label>
    <input class="form-control" name="user" type="text" id="user" value="{{ isset($doc->user) ? $doc->user : ''}}" >
    {!! $errors->first('user', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($doc->status) ? $doc->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
