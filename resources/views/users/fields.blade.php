
<div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
    <label for="fname" class="col-md-4 control-label">First Name</label>
    <div class="col-md-6">
        <input id="fname" type="text" class="form-control" name="fname" value="{{ old('fname') }}" required autofocus>
        @if ($errors->has('fname'))
            <span class="help-block">
                <strong>{{ $errors->first('fname') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
    <label for="lname" class="col-md-4 control-label">Last Name</label>
    <div class="col-md-6">
        <input id="lname" type="text" class="form-control" name="lname" value="{{ old('lname') }}" required autofocus>
        @if ($errors->has('lname'))
            <span class="help-block">
                <strong>{{ $errors->first('lname') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <label for="address" class="col-md-4 control-label">Address</label>
    <div class="col-md-6">
        <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>
        @if ($errors->has('address'))
            <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">E-mail Address</label>
    <div class="col-md-6">
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">Password</label>
    <div class="col-md-6">
        <input id="password" type="password" class="form-control" name="password" required>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    <label for="phone" class="col-md-4 control-label">Phone</label>
    <div class="col-md-6">
        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
    <label for="image" class="col-md-4 control-label">Select image to upload:</label>
    <div class="col-md-6">
        <input id="image" type="file" class="form-control " name="image" value="{{ old('image') }}" required autofocus>
        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4 ">
        <button type="submit" class="btn btn-primary btn-block">
            Save
        </button>
    </div>
</div>