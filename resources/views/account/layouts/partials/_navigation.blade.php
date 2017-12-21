<ul class="nav nav-pills nav-stacked">
  {{-- {{on_page('account') ? 'active' : ''}} --}}
  <li class="{{return_if(on_page('account'), 'active')}}">
    <a href="{{route('account.index')}}">Account Overview</a>
  </li>

  <li class="{{return_if(on_page('account/profile'),'active')}}">
    <a href="{{route('account.profile.index')}}">Profile</a>
  </li>

  <li class="{{return_if(on_page('*/password'),'active')}}">
    <a href="{{route('account.password.index')}}">Change Password</a>
  </li>
</ul>

<hr>

@subscribed
  <ul class="nav nav-pills nav-stacked">
    @subscriptionnotcancelled
      <li class="{{return_if(on_page('account/subscription/swap'), 'active')}}">
        <a href="{{ route('account.subscription.swap.index') }}">Change plan</a>
      </li>

      <li class="{{return_if(on_page('account/subscription/cancel'), 'active')}}">
        <a href="{{route('account.subscription.cancel.index')}}">Cancel subscription</a>
      </li>
    @endsubscriptionnotcancelled


    @subscriptioncancelled
          <li class="{{ return_if(on_page('account/subscription/resume'), 'active') }}">
              <a href="{{ route('account.subscription.resume.index') }}">Resume subscription</a>
          </li>
    @endsubscriptioncancelled


  </ul>

  @endsubscribed

  <ul class="nav nav-pills nav-stacked">
      <li class="{{ return_if(on_page('account/subscription/card'), 'active') }}">
        <a href="{{ route('account.subscription.card.index') }}">Update card</a>
      </li>

    @subscriptioncancelled
          <li class="{{ return_if(on_page('account/subscription/resume'), 'active') }}">
              <a href="{{ route('account.subscription.resume.index') }}">Resume subscription</a>
          </li>
    @endsubscriptioncancelled
  </ul>
