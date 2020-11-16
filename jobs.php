<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/input.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">        
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/hidelogo.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>   

</head>

<body>

<nav class="navbar navbar-expand-md navbar-light bg-light">
<div>
    
    <center><p class="header_text">CANDIDATES LIST IN ${Constitution}</p></center>
    
    </div>
</nav>

<form action="thank_you.php" method="POST">

<div align="center">

	<table class="form_tab">

	<tr>

		<td>

		<div class="cand_list">

		<center>
			<table>
			<tr>

				<td><input type="radio" name="candidate" value="${candidate1}" required></td>

				<td><img src="images/1.png" height="50px" width="50px"/></td>

				<td>
					<p><strong>${candidate_1}</strong><br/></p>
				</td>

			</tr>

			<tr>

				<td><input type="radio" name="candidate" value="${candidate2}" required></td>

				<td><img src="images/1.png" height="50px" width="50px"/></td>

				<td>
					<p><strong>${candidate_2}</strong><br/></p>
				</td>

			</tr>

			<tr>

				<td><input type="radio" name="candidate" value="${candidate3}" required></td>

				<td><img src="images/1.png" height="50px" width="50px"/></td>

				<td>
					<p><strong>${candidate_3}</strong><br/></p>
				</td>

			</tr>

			<tr>

				<td><input type="radio" name="candidate" value="${candidate3}" required></td>

				<td><img src="images/1.png" height="50px" width="50px"/></td>

				<td>
					<p><strong>${candidate_4}</strong><br/></p>
				</td>

			</tr>

			<tr>

				<td><input type="radio" name="candidate" value="${candidate3}" required></td>

				<td><img src="images/1.png" height="50px" width="50px"/></td>

				<td>
					<p><strong>${candidate_5}</strong><br/></p>
				</td>

			</tr>

			<tr>

				<td><input type="radio" name="candidate" value="${candidate3}" required></td>

				<td><img src="images/1.png" height="50px" width="50px"/></td>

				<td>
					<p><strong>${candidate_6}</strong><br/></p>
				</td>

			</tr>

		</table></center>

		</div>

		</td>

	</tr>

	<tr>

		<td>

		<center><button type="submit" class="vote_btn" name="vote">VOTE</button></center>

		</td>

	</tr>

	</table>

</div>

</form>

</body>

</html>