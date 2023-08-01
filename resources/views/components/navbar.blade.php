<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Navigation Bar</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Font Awesome Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <style>

      html{
        font-size:100%;
      }
         * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
      }

header {
  position: fixed;
  width: 100%;
  background-color: #88888849;
  padding: 0.7rem 2rem;
}
nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
nav ul {
  list-style: none;
  display: flex;
  gap: 3.2rem;
}
nav a {
  font-size: 1.4rem;
  text-decoration: none;
}
nav a#logo {
  color: #000000;
  font-weight: 700;
}
nav ul a {
  color: #ffffff;
  font-weight: 600;
}
nav ul a:hover {
  color:#FF9E49;
  font-weight:bold;
}
section#home {
  height: 100vh;
  display: grid;
  place-items: center;
}
h1 {
  font-size: 4rem;
}
#ham-menu {
  display: none;
}
nav ul.active {
  left: 0;
}
@media only screen and (max-width: 991px) {
  html {
    font-size: 83%;
  }
  header {
    padding: 1.2rem 3rem;
  }
}
@media only screen and (max-width: 767px) {
  html {
    font-size: 90%;
  }
  header {
    padding: 1.4rem 2rem;
  }
  #ham-menu {
    display: block;
    color: #ffffff;
  }
  nav a#logo,
  #ham-menu {
    font-size: 2.5rem;
  }
   
  nav a {
  font-size: 1.3rem;
   text-decoration: none;
  }
  nav ul {
    background-color: #888888e7;
    position: fixed;
    left: -100vw;
    top: 102px;
    width: 100vw;
    height: calc(50vh - 73.6px);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
    transition: 1s;
    gap: 0;
  }
}
@media only screen and (max-width: 575px) {
  
  html {
    font-size: 85%;
  }
  header {
    padding: 1.4rem 1.7rem;
  }

  nav a {
    font-size: 1.2rem;
   text-decoration: none;
  }

  nav a#logo,
  #ham-menu {
    font-size: 2rem;
  }
  
  nav ul {
    top: 95px;
    height: calc(40vh - 63.7px);
  }
}

.btn {
width:100px;
height:37px;
}

.btn-primary{
background-color: #FF9E49 !important;
color:black !important;
font-weight: bold !important;
border:none !important;
}

    </style>
  </head>
  <body>
    <header>
      <nav>
        <a href="#home" id="logo" ><img src="image/bmbklogo.png" style="width:40px"></a>
        <i class="fas fa-bars" id="ham-menu"></i>
        <ul id="nav-bar">
          <li>
            <a href="/">Beranda</a>
          </li>
          <li>
            <a href="#about">Tentang</a>
          </li>
          <li>
            <a href="#tabel">Tabel Anggaran</a>
          </li>
          <li>
            <a href="#contact">Kontak</a>
          </li>
          <li>
            <a @auth href="{{ route('variabels') }}" @else href="{{ route('login') }}" @endauth class="btn btn-primary ">Login</a>
          </li>
        </ul>
      </nav>
    </header>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    
    <script>
        let hamMenuIcon = document.getElementById("ham-menu");
        let navBar = document.getElementById("nav-bar");
        let navLinks = navBar.querySelectorAll("li");

        hamMenuIcon.addEventListener("click", () => {
          navBar.classList.toggle("active");
          hamMenuIcon.classList.toggle("fa-times");
        });
        navLinks.forEach((navLinks) => {
          navLinks.addEventListener("click", () => {
            navBar.classList.remove("active");
            hamMenuIcon.classList.toggle("fa-times");
          });
        });

    </script>
    
  </body>
</html>
