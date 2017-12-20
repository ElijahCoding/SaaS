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
