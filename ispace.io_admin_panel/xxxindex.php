
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MAIN ADMIN PANEL</title>
  
  <style>
* {
     box-sizing: border-box;
  }

  body {
    margin: 0;
  }

  /* Style the header */
  .header {
    padding: 5px;
    text-align: center;
  }

  /* Style the top navigation bar */
  .topnav {
    overflow: hidden;
  }

  /* Style the topnav links */
  .topnav a {
    float: left;
    display: block;
    text-align: center;
    padding: 12px 12px;
    text-decoration: none;
    background-color: #f3f3f3;
  }

  /* Change color on hover */

 .topnav a:hover:not(.active) {
    background-color: #ddd;
  }

 .topnav a.active {
    color: white;
    background-color: #04AA6D;
  }


  .xcolumn {
    float: left;
    width: 100%;
    padding-left: 10px; 
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

<div class="topnav">
  <a href="menu_users.html" target="iframe_a">Users</a> 
  <a href="menu_tvseries.html" target="iframe_a" >Tv Series</a> 
  <a href="menu_movies.html" target="iframe_a" >Movies</a> 
  <a href="menu_books.html" target="iframe_a"  >Books</a> 
  <a href="menu_music.html" target="iframe_a"  >Music</a>
  <a href="menu_artworks.html" target="iframe_a"  >ArtWorks</a> 
</div>



<div class="row">
  <div class="xcolumn">
          <iframe  name="iframe_a" height="1000px" width="100%" title="Iframe main"></iframe>
  </div>

</div>

</body>

</html>
