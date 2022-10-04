<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MAIN ADMIN PANEL</title>
  <link rel="stylesheet" href="./welcome.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/69437bca27.js" crossorigin="anonymous"></script>

</head>

<body>
  <div class="Container">
    <header>
      <div class="Logo_Container">
        <img src="img/I-SPACE_Logo.png" alt="Logo">
      </div>
      <nav>
        <ul class="Nav_Links">
          <a class="UsersTop" href="menu_users.html" target="iframe_a">Users</a>
          <a class="MoviesTop" href="menu_movies.html" target="iframe_a">Movies</a>
          <a class="TVSeriesTop" href="menu_tvseries.html" target="iframe_a">TV Series</a>
          <a class="MusicTop" href="menu_music.html" target="iframe_a">Music</a>
          <a class="BooksTop"href="menu_books.html" target="iframe_a">Books</a>
          <a class="ArtworksTop" href="menu_artworks.html" target="iframe_a">Artworks</a>
          <a class="SignOutTop" href="logout.php" class="btn btn-danger ml-3">Sign Out</a>
        </ul>
      </nav>
      <div class="Nav_Profile">
        <a class="Profile" href="userProfile.html"><img src="img/USER.png" alt="profile_picture" style="max-width:56px"></a>
        <h5 class="my-5">Hi, <?php echo htmlspecialchars($_SESSION["username"]); ?></h5>
      </div>
    </header>

    <div class="row">
      <div class="xcolumn">
        <iframe  name="iframe_a" height="98%" width="100%" title="Iframe main"></iframe>
      </div>
    </div>
  </div>
</body>
</html>
