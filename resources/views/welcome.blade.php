<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>User</title>
	<link rel="stylesheet" href="/css/User-interface.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>



<div class="wrapper">
    <div class="navbar">
        <div class="left">
            <ul>
              <li><a href="#">
                <i class="fas fa-home"></i></a></li>
              <li><a href="#">
                <i class="fas fa-envelope"></i></a></li>
              <li><a href="#">
                <i class="fas fa-bell"></i></a></li>
             <li class="search"><input class="input_box" type="text" name="" placeholder="Search"><a class="btn" href="#">
                <i class="fas fa-search"></i></a></li>
          </ul>
        </div>
        <div class="right">
            <ul>
              <li>
                <a href="#">
                  <p>Andi Qorri<br> <span>User</span></p><img src="/img/Profile.png" alt="user" width="40"><i class="fas fa-angle-down"></i>
                </a>
                 
                <div class="dropdown">
                    <ul>
                      <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
                      <li><a href="#"><i class="fas fa-sliders-h"></i> Settings</a></li>
                      <li><a href="#"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
                  </ul>
                </div>
                
              </li>
          </ul>
        </div>
    </div>
</div>	

<script>
	document.querySelector(".right ul li").addEventListener("click", function(){
		  this.classList.toggle("active");
	});
</script>

</body>
</html>