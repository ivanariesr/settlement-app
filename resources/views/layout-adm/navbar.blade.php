<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      </ul>            
    </form>
    
    <ul class="navbar-nav navbar-right">        
      <li><a href="#" class="nav-link nav-link-lg nav-link-user">
        @if(\Auth::check())
        <!--img alt="Profile" src="../assets/img/avatar/avatar-3.png" class="rounded-circle mr-1"-->
        <div class="d-sm-none d-lg-inline-block">Hi, {{\Auth::user()->name}}</div></a>
        @else
        <div class='dash '>
          <div class='error'> You are not logged in  </div>
          <div>  <a href="{{url('login')}}">Login</a> </div>
        </div>
        @endif
      </li>
    </ul>


  </nav>