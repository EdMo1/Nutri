<!-- <!DOCTYPE html> -->
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>BMR-BMI Calculator</title>

<div class="test"></div>


</head>
<body>
	<div class="center container">
		<h1>BMR-BMI <br>Calculator</h1><hr>
	<div class="center">
		<h4>Height</h4>
		<input id="heightInFeet" class="if" type="number" value="5"><p class="u i"> ft</p>
		<input id="heightInInch" class="if" type="number" value="5" max="11.99"><p class="u i"> inch</p>
		<h4>Weight</h4>
		<input id="weight" class="if" type="number" value="60"><p class="u i"> KG</p>
		<h4>Age</h4>
		<input id="age" class="if" type="number" value="25"><p class="u i"> Yr</p>

		<br>
		<input id="fgender" class="i"  type="radio" name="gender" value="female"><p class="i">Female</p>
		<input id="mgender" class="i"  type="radio" name="gender" value="male"><p class="i">Male</p>
		<br><br>
		<!-- <input class="resetButton button" type="reset" name="" value="Reset"> -->
		<input class="submitButton button" type="button" name="" value="Measure">
		<br>
		<br>
		<br>

		<div class="resultContainer">
		<h4>BMI:&nbsp;<span class="bmi"></span></h4>

		<h4>BMR:&nbsp;<span class="bmr"></span></h4>

		<h4>Status:&nbsp;<span class="status"></span></h4>
		<h4>Normal Weight:&nbsp;<span class="nweight"></span></h4> 
		</div>
















	</div>
	<hr>
	<p class="left i dm"><strong>(Version: V1.5) Developed By <a href="https://nhas.me">Nurul Huda</a></strong></p>

	</div>
	



<script type="text/javascript" src="script.js"></script>
<!-- <script type="text/javascript" src="bmi-bmr-calc.js"></script> -->

</body>
</html>