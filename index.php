<?php 
if(preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])){
return false;
}
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

.row::after {
  content: "";
  clear: both;
  display: block;
}

[class*="col-"] {
  float: left;
  padding: 6px;
}

html {
  font-family: "Lucida Sans", sans-serif;
}

.header {
  background-color: #9933cc;
  color: #ffffff;
  padding: 6px;
}

.menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.menu li {
  padding: 8px;
  margin-bottom: 7px;
  background-color: #33b5e5;
  color: #ffffff;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.menu li:hover {
  background-color: #0099cc;
}

.aside {
  background-color: #33b5e5;
  padding: 15px;
  color: #ffffff;
  text-align: center;
  font-size: 14px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.footer {
  background-color: #0099cc;
  color: #ffffff;
  text-align: center;
  font-size: 12px;
  padding: 15px;
}

/* For desktop: */
.col-1 {width: 8.33%;}
.col-2 {width: 16.66%;}
.col-3 {width: 25%;}
.col-4 {width: 33.33%;}
.col-5 {width: 41.66%;}
.col-6 {width: 50%;}
.col-7 {width: 58.33%;}
.col-8 {width: 66.66%;}
.col-9 {width: 75%;}
.col-10 {width: 83.33%;}
.col-11 {width: 91.66%;}
.col-12 {width: 100%;}

@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
}
  width: 250px;
  box-shadow: 2 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
}

div.container {
  padding: 10px;
}
</style>
</head>
<body>

<div class="header">
  <h1 style="font-size: 45px; text-align: center; text-shadow: 3px; font-family: vardana;">Welcome To Obaid Samim Development Server
</h1>
</div>

<div class="row">
  <div class="col-3 right">
    <div class="aside">
      <h2>Lightwieght HTTP Server For windows</h2>
      <p>It is very small and portable for your projects.</p>
      <p>I create this HTTP server for developers becuase sometimes the Apache Web Server not working becuase the other software use the port 80 we can't start xampp many other problems therefore I migrated from the Xampp and I developed this HTTP Server using the PHP. functionality: implement a small, fast, self-contained, high availability</p>
      <h2>Installation</h2>
      <p>1.download project and colon it from zip and copy it into your project folder.</p>
      <p>2. start the server using server file by double click on it to start and all project files put into the current folder! Enjoy it.</p>
    </div>
  </div>
  <div class="col-6">
    <h2>Obaid Samim HTTP Server For Development</h2>
    <p>This OS HTTP Server this enviroment very small and this is meant only for development purposes. It has certain configuration settings that make it easy to develop locally but that are insecure if you want to have your installation accessible to others. for development using PHP with 20kb only working on the windows and it only have the PHP Server now only used as PHP server-side for developer with starting this server do your development with out any Apache and WAMP.</p>
    <h2>System Requirements For OS HTTP Server</h2>
      <ol>
        <li>Operating system - OS HTTP SERVER is independent platform</li>
        <li>Browser support - PHP works in Edge/IE (from IE 8), Firefox, Chrome, Safari, Opera</li>
        <li>Programming language - PHP is based on PHP. Install PHP and Work on PHP 5 or later</li>
      </ol>
      <hr>
      <p>for more contact with developer +93(0)782000797 obaidsamim@hotmail.com</p>
  </div>
  <div class="col-3 right">
    <div class="polaroid aside">
  <img width="200" height="300" src="serverfiles/obaid.jpg" alt="Norway" style="width:100%">
  <div class="container">
    <p>Obaid Samim, Software Developer</p>
</div>
    </div>
  </div>
</div>

<footer>
<div class="footer">
  <p>Developed By Obaid Samim cross platform for PHP Developer Open Source.</p>
</div>
</footer>
</body>

<!-- Mirrored from www.w3schools.com/css/tryit.asp?filename=tryresponsive_breakpoints by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 21 Jul 2019 04:50:02 GMT -->
</html>
