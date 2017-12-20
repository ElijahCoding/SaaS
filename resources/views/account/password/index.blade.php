@extends('account.layouts.default')

@section('account.content')
  <div class="panel panel-default">
    <div class="panel-body">
      <form action="{{route('account.password.store')}}" method="post">
        {{csrf_field()}}

        <div class="form-group{{$errors->has('password_current') ? ' has-error' : ''}}">
          <label for="password_current" class="control-label">Current Password</label>
          <input type="password" name="password_current" class="form-control" id="password_current">
          @if ($errors->has('password_current'))
            <span class="help-block">
              <strong>{{$errors->first('password_current')}}</strong>
            </span>
          @endif
        </div>

        <div class="form-group{{$errors->has('password') ? ' has-error' : ''}}">
          <label for="password" class="control-label">New Password</label>
          <input type="password" name="password" class="form-control" id="password">
          @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{$errors->first('password')}}</strong>
            </span>
          @endif
        </div>

        <div class="form-group{{$errors->has('password_confirmation') ? ' has-error' : ''}}">
          <label for="password_confirmation" class="control-label">New Password Again</label>
          <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
          @if ($errors->has('password_confirmation'))
            <span class="help-block">
              <strong>{{$errors->first('password_confirmation')}}</strong>
            </span>
          @endif
        </div>

        <button type="submit" class="btn btn-primary">Change Password</button>
      </form>
    </div>
  </div>
@endsection
