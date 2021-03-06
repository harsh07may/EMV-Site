
<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
	<style>
		body {
			background-color: white;
			margin: 0;
			overflow-x: hidden;
		}

		.topnav {
			background-color: white;
			overflow: hidden;
			padding: 20px;
			width: 100%;
			margin: 0;
			border-bottom: solid 1px #3a3a3a;
		}

		/* Style the links inside the navigation bar */
		.topnav a {
			float: left;
			color: #242222;
			text-align: center;
			padding: 14px 40px;
			text-decoration: none;
			font-size: 19px;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}

		/* Change the color of links on hover */
		.topnav a:hover {
			background-color: #ddd;
			color: black;
		}

		/* Add a color to the active/current link */
		.topnav a.active {
			background-color: #04aa6d;
			color: white;
		}

		h2 {
			border-bottom: #ECEEF0 4px solid;
			padding-bottom: 3vh;
		}

		.card_2 {
			font-family: "Helvetica";
			padding-bottom: 10%;
			/* Add shadows to create the "card" effect */
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			transition: 0.3s;
			margin: 50px;
		}

		input,
		button {
			margin: 10px;
		}
		#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #7a7a7a;
  color: white;
}
	</style>
</head>

<body>

	<!-- navbar -->
	<nav>
		<div class="topnav">
			<a class="navbar-brand" href="index.php">
				<img src="logo.svg" alt="Pascal Logo" class="logo_img" height="32px" width="80px"/>
       		</a>
        <a href="index.php#products">Products</a>
			<a href="finance.php">Purchase</a>
			<a href="about_us.html">About</a>
			<a href="show_customers.php">Track Order</a>
		</div>
	</nav>
	<center>
		<?php
		session_start();
		$inp=$_SESSION['username'];	
		$conn = mysqli_connect("localhost", "root", "", "pascal");

		// Check connection
		if ($conn === false) {
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		?>
		<div class="card_2">
			<h2>Track Your Order:</h2>
			<label for="">Name</label>
			<input type="text" id="text-inp" placeholder="" value="<?php echo $inp ?>" disabled>
			<label for="">Contact</label>
			<input type="text" id="text-inp-2" />
			<br>
			<button type="button" name="customers" onclick="showCustomer()">Submit</button>
			<br>
			<table border="2" id="customers">
				<tr>
					<th>NAME</th>
					</th>
					<th>CONTACT</th>
					<th>EMAIL</th>
					<th>ADDRESS</th>
					<th>PRODUCT</th>
				</tr>
				<tbody id="data"></tbody>
			</table>
			<div id="txtHint"></div>
		</div>
		<?php
		// Close connection
		mysqli_close($conn);
		?>

	</center>
	<script>
		function showCustomer() {
			var str = document.getElementById("text-inp").value;
			var str_2 = document.getElementById("text-inp-2").value;
			if (str == "") {
				document.getElementById("txtHint").innerHTML = "";
				return;
			}
			const xhttp = new XMLHttpRequest();
			xhttp.open("GET", "data.php", true);
			xhttp.send();
			xhttp.onload = function() {
				if (this.readyState == 4 && this.status == 200) {
					var data = JSON.parse(this.responseText);
					console.log(data);
					var html = "";
					for (var a = 0; a < data.length; a++) {
						console.log("Input:" + str);
						console.log("Loop:" + data[a].fname);
						if (data[a].fname === str && data[a].contact === str_2) {
							console.log("true");
							console.log(str);
							var fname = data[a].fname;
							var contact = data[a].contact;
							var user_email = data[a].user_email;
							var address = data[a].address;
							var bikes = data[a].bikes;
							html += "<tr>";
							html += "<td>" + fname + "</td>";
							html += "<td>" + contact + "</td>";
							html += "<td>" + user_email + "</td>";
							html += "<td>" + address + "</td>";
							html += "<td>" + bikes + "</td>";
							html += "</tr>"
						} else
							console.log(false);
					}
					document.getElementById("data").innerHTML = html;
				}

			}
		}
	</script>
</body>

</html>