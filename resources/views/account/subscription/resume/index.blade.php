@extends('account.layouts.default')

@section('account.content')
  <div class="panel panel-default">
    <div class="panel-body">
      <form action="{{route('account.subscription.resume.store')}}" method="post">
        {{csrf_field()}}

        <p>Confirm your subscription resume.</p>
        <button type="submit" class="btn btn-primary">Resume</button>
      </form>
    </div>
  </div>
@endsection
