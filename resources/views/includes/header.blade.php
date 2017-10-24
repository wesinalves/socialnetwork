<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('dashboard')}}">PetFriend</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  
  <div class="navbar-text ml-auto">
	  <a  class='mr-2' href="{{route('account')}}">Account</a> 
	  <a  href="{{route('logout')}}">Logout ({{(Auth::user())?Auth::user()->first_name:''}})</a>
	</div>
  
  
</nav>
</header>