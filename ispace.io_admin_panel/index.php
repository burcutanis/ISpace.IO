
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MAIN ADMIN PANEL</title>
  
  <style>
  {
     box-sizing: border-box;
  }

  body {
    margin: 0;
  }

  /* Style the header */
  .header {
    padding: 0px;
    text-align: left;
  }
/* -------------------------------------------- */
  /* Style the top navigation bar */
  .topnav {
    overflow: hidden;
  }

  /* Style the topnav links */
  .topnav a {
    float: left;
    display: block;
    text-align: center;
    padding: 22px 22px;
    text-decoration: none;
    background-color: #f3f3f3;
    background: #3399ff;
  }

  /* Change color on hover */

 .topnav a:hover:not(.active) {
    background-color: #ddd;
    background: #cce5ff;
  }

 .topnav a.active {
    color: white;
    background-color: #04AA6D;
  }
/* -------------------------------------------- */
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: blue;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: red;
} 
/* -------------------------------------------- */
  .xcolumn {
    float: left;
    width: 100%;
    padding-left: 0; 
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }



  /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 800px) {
     .xcolumn {   
       width: 100%;
       padding: 0;
     }
  }





</style>
</head>

<body>

<div class="header">
  <h2> ADMIN PANEL </h2>
</div>

<!---
<div class="topnav">
  <a href="menu_users.html" target="iframe_a">Users</a> 
  <a href="menu_tvseries.html" target="iframe_a" >Tv Series</a> 
  <a href="menu_movies.html" target="iframe_a" >Movies</a> 
  <a href="menu_books.html" target="iframe_a"  >Books</a> 
  <a href="menu_music.html" target="iframe_a"  >Music</a>
  <a href="menu_artworks.html" target="iframe_a"  >ArtWorks</a> 
</div>
---->

<div >
  <ul>
  <li><a href="menu_users.html" target="iframe_a">Users</a> </li>
  <li><a href="menu_tvseries.html" target="iframe_a" >Tv Series</a> </li> 
  <li><a href="menu_movies.html" target="iframe_a" >Movies</a>  </li>
  <li><a href="menu_books.html" target="iframe_a"  >Books</a>  </li>
  <li><a href="menu_music.html" target="iframe_a"  >Music</a> </li>
  <li><a href="menu_artworks.html" target="iframe_a"  >ArtWorks</a> </li>
  </ul> 
</div>


<div class="row">
  <div class="xcolumn">
          <iframe  name="iframe_a" height="1000px" width="100%" title="Iframe main"></iframe>
  </div>

</div>

</body>

</html>
