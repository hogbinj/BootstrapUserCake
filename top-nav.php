<?php
if (!securePage($_SERVER['PHP_SELF'])){die();}
echo"
<nav class='navbar navbar-default' role='navigation'>
  <div class='container-fluid'>
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
        <span class='sr-only'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <a class='navbar-brand' href='#'>Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='#'>Link</a></li>
        <li><a href='#'>Link</a></li>
        <li class='dropdown'>
          <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Dropdown <b class='caret'></b></a>
          <ul class='dropdown-menu'>
            <li><a href='#'>Action</a></li>
            <li><a href='#'>Another action</a></li>
            <li><a href='#'>Something else here</a></li>
            <li class='divider'></li>
            <li><a href='#'>Separated link</a></li>
            <li class='divider'></li>
            <li><a href='#'>One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class='navbar-form navbar-left' role='search'>
        <div class='form-group'>
          <input type='text' class='form-control' placeholder='Search'>
        </div>
        <button type='submit' class='btn btn-default'>Submit</button>
      </form>
      ";
	  

if(isUserLoggedIn()) {
	echo "
    <ul class='nav navbar-nav navbar-right'>
		<li class='dropdown'>
        <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Account Info<b class='caret'></b></a>
			<ul class='dropdown-menu'>
				<li><a href='account.php'>Account Home</a></li>
				<li><a href='user_settings.php'>User Settings</a></li>
				<li><a href='logout.php'>Logout</a></li>
			</ul>
		</li>

	";
	
	//Links for permission level 2 (default admin)
	if ($loggedInUser->checkPermission(array(2))){
	echo "
		<li class='dropdown'>
        <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Admin Info<b class='caret'></b></a>
			<ul class='dropdown-menu'>
				<li><a href='admin_configuration.php'>Admin Configuration</a></li>
				<li><a href='admin_users.php'>Admin Users</a></li>
				<li><a href='admin_permissions.php'>Admin Permissions</a></li>
				<li><a href='admin_pages.php'>Admin Pages</a></li>
			</ul>
		</li>";
	
		  
	}
	echo "
	 </ul>";
	
} 
//Links for users not logged in
else {
	echo "
	<ul class='nav navbar-nav navbar-right'>
		<li class='dropdown'>
        <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Account Info<b class='caret'></b></a>
			<ul class='dropdown-menu'>
				<li><a href='index.php'>Home</a></li>
				<li><a href='login.php'>Login</a></li>
				<li><a href='register.php'>Register</a></li>
				<li><a href='forgot-password.php'>Forgot Password</a></li>";
	if ($emailActivation)
	{
	echo "
				<li><a href='resend-activation.php'>Resend Activation Email</a></li>";
	}
echo "
			</ul>
		</li>
	</ul>";
}
	  	  
echo "	  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
";