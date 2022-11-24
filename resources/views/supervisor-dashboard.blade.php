<!DOCTYPE html>

<html>

<head>
    <title>Supervisor Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<style>
    *{
    padding: 0;
    margin: 0;
    font-family: 'Josefin Sans', sans-serif;
    box-sizing: border-box;
}

.start{
    height: 100vh;
    width: 100%;
    background-size: cover;
    background-position: center;
    background-color: rgb(248, 239, 226);
}

nav{
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-left: auto;
    padding-top: 25px;
    padding-left: 8%;
    padding-right: 5%;
}

#header {
    position: relative;
    display: flex;
    z-index: 1;
    width: 100%;
    height: 100px;
    transition: 250ms height;
    background-color: white;
}

nav ul li{
    list-style-type: none;
    display: inline-block;
    padding: 10px  25px;
}

nav ul li a{
    color: black;
    text-decoration: none;
    font-weight: bold;
    text-transform: capitalize;
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

.btn:hover{
    transform: scale(1.2);
}

footer{
    position: relative;
    width: 100%;
    height: 200px;
    background: #101010;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

footer p:nth-child(1){
    font-size: 30px;
    color: white;
    margin-bottom: 20px;
    font-weight: bold;
}

footer p:nth-child(2){
    color: white;
    font-size: 17px;
    width: 500px;
    text-align: center;
    line-height: 26px;
}

.social{
    display: flex;
}

.social a{
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    background:  #4ba551;
    border-radius: 50%;
    margin: 22px 10px;
    color: white;
    text-decoration: none;
    font-size: 20px;
}

.social a:hover{
    transform: scale(1.3);
    transition: .3s;
}

.end{
    
}
</style>

<body>
    <div class="start">
        <!------header start--------->
        <div id="header">
            <div class="w3-top w3-bar w3-white w3-wide w3-padding w3-card">
                   
            </div>
        </div>

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <div class="w3-top w3-bar w3-white w3-wide w3-padding w3-card">
                <a href="#home" class="w3-bar-item w3-button"><b>Smart</b> Intern</a>
            </div>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="#">Welcome, {{ Auth::user()->email }}</a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'supervisor-dashboard' ? 'active' : '' }}" aria-current="page" href="/supervisor-dashboard">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="#">Student</a>
                            </li>
                            <li class="nav-item">
                                <a href="#">Survey</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'profile' ? 'active' : '' }}" aria-current="page" href="/userprofile">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li>
    
                        </ul>
                    </div>
                    
                </nav>
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <!--<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">!-->
    
                    @yield('content')
    
                    <!--</div>!-->
                </main>
            </div>
        </div>  

        <!------footer start--------->
        <footer>
            <div class="social">
                
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-dribbble"></i></a>
            </div>
            <p class="end">CopyRight By Smart Intern</p>
		</div>
    </div>
</body>

</html>