<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style.css">

    <style>
        .p1 {
          font-family: "Lucida Console", "Courier New", monospace;
        }

.start{
    height: 100vh;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-color: rgb(248, 239, 226);
}

nav ul li a:hover{
    color: #4ba551;
    transition: .4s;
}

.btn{
    background-color:#4ba551;
    color: white;
    text-decoration: none;
    border: 2px solid transparent;
    font-weight: bold;
    padding: 10px 25px;
    border-radius: 30px;
    transition: transform .4s; 
}

        </style>
</head>

<body>
    <div class="start">
        <!------header start--------->
      
    <!-- Navbar (Sits on top) -->
    <div class="w3-top w3-bar w3-white w3-wide w3-padding w3-card">
        <a href="#home" class="w3-bar-item w3-button"><b>Smart</b> Intern</a>
    </div>

    <!-- Page Start -->
    <div id="home" class="w3-content" style="max-width:1564px">

    <!-- Image in Display Container -->
    <div class="w3-display-middle w3-margin-top w3-center">
            
        <h1>
            <p class="p1 w3-text-grey"><b>Welcome to</b>
            <p class="w3-text-black w3-bar-item fs-20"><b>Smart</b> Intern</a></p><br>
        </h1>

        <div class="collapse navbar-collapse" id="navbarNav">
                              
        <ul class="navbar-nav">
        @guest
          
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}"><b>Login<b></a>
        </li>
          
        @else
          
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
        </li>
          
        @endguest
        </ul>
                          
    </div>
        
        <div class="container mt-5">
          
            @yield('content')
                  
        </div>    
    </div> 

    

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</html>