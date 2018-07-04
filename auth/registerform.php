<section class="flex-container">
	<form id="registerform" method="post" action="register.php">
		<h3>Register an account</h3>
		<p><em>all fields are required</em></p>
		<span>Username:</span>
		<input type="text" name="Username" required>
		<span> Password: </span>
		<input type="password" name="Password" required>
		<span>Email address:</span>
		<input type="email" name="Email" required>
		<span>Age range:</span>
		<select name="AgeRange" required>
			<option value="3-9">3-9</option>
			<option value="10-17">10-17</option>
			<option value="18-29">18-29</option>
			<option value="30-59">30-59</option>
			<option value="60+">60+</option></select><br>
		<input type="submit" name="Register" value="Register">
	</form>
</section>