<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/profile.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
  <title>Profile</title>
</head>

<body>
  <div class="page">
    <header tabindex="0">JobSeeker Profile</header>
    <div id="nav-container">
      <div class="bg"></div>
      <div class="button" tabindex="0"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </div>
      <div id="nav-content" tabindex="0">
        <ul>
          <li><a href="forum_voter.php">Manage Your Profile</a></li>
          <li><a href="vote.php" style="color:green;">View Job Post</a></li>
          <li><a href="my_application.php">My Application(s)</a></li>
          <li><a href="logout.php" style="color:red;">LOGOUT</a></li>
        </ul>
      </div>
      <div class="cardDivision col-7">
        <div class="card col-6">
          <br> <img class="card-img-top" src="https://picsum.photos/200/150/?random">
          <br>
          <div class="card-block">
            <center>
              <h4 class="card-title">${Name}</h4></center>
            <div class="card-text">
              <p>Date of Birth : ${DOB}</p>
              <p>Email : ${Email}</p>
              <p>Address : ${Address}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>