<html>
<head>
	<title><?php echo $title?></title>
	<meta charset="utf-8"/>

	<link rel="stylesheet" type="text/css" href="../public/css/login_css.css">
	<script src="../public/js/jQuery.js"></script>
	<script src="../public/js/login_js.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<div id="main">
		<div id="header">
			<img id="logo" src="../public/images/deskmine_logo_trans.png"/>
		</div>
		<div id="buttons">
			<!--<div id="signup_button"/>--><div id="login_button">Log In</div><div id="signup_button">Sign up</div>
		</div>
	</div>

	<div id="backgrounds">
		
		<div id="signup_bg">
			<div id="signup_bg_cover"></div>
			<img id="signup_bg_img" src="../public/images/signup.jpg"/>
		</div>
	</div>
	
	<div id="container_login" visibility="hidden">
		<div id="login_sec">
			<div class="login_header">
				<div class="welcome">Welcome to<br><hr></div>
				<div class="deskmine">deskMine</div>
				<div class="description">DeskMine is an open-source application that aims to...</div>
			</div>
			<div id="login_form">
				<?php echo form_open('login'); ?>
					<div id="invalid_login"><?php echo form_error('password'); ?></div>
					<br>
					Username: <br><input type="text" name="username" class="login_field" autocomplete="off"><br/>
					Password: <br><input type="password" name="password" class="login_field" autocomplete="off"><br/>
					<input type="submit" name="Log_in" value="Log In" class="login_submit"/><br><input type="reset" class="cancel_login" value="Cancel"/>
				</form>
			</div>
		</div>
	</div>

	<div id="container_signup" visibility="hidden">
		<div id="signup_sec">
			<?php echo form_open('signup'); ?>
			<div class="signup_header" section="signup">User Details</div>
			<div id ="signup_form">
				<table>
					<tr><td class="signup_label">First name</td>
						<td><input type="text" name="in_firstname" value="<?php echo set_value('in_firstname'); ?>" class="signup_field" field="firstname" autocomplete="off"/>*</td>
						<td class="signup_error"><?php echo form_error('in_firstname'); ?></td>
					</tr>
					<tr><td></td></tr>

					<tr><td class="signup_label">Last Name:</td>
						<td><input type="text" name="in_lastname" value="<?php echo set_value('in_lastname'); ?>" class="signup_field" field="lastname" autocomplete="off"/>*</td>
						<td class="signup_error"><?php echo form_error('in_lastname'); ?></td>
					</tr>
					<tr><td></td></tr>

					<tr><td class="signup_label">Avatar:</td>
						<td><input type="file" name="in_image" id="image" class="signup_field"/></td>
					</tr>
					<tr><td></td><td class="image_description"><font class="reminder">.jpeg, .jpg, .png, .bmp format only</font></td></tr>

					<tr><td class="signup_label">Date of Birth:</td><td>
						<select name="in_month" id="month" class="signup_field_month">
							<option value="1"> January </option>
							<option value="2"> February </option>
							<option value="3"> March </option>
							<option value="4"> April </option>
							<option value="5"> May </option>
							<option value="6"> June </option>
							<option value="7"> July </option>
							<option value="8"> August </option>
							<option value="9"> September </option>
							<option value="10"> October </option>
							<option value="11"> November </option>
							<option value="12"> December </option>
						</select>	
						<select name="in_day" id="day" class="signup_field_day">
							<?php
								for($date=1; $date<=31; $date++)
								{
									echo "<option value="."'$date'".">".$date."</option>";
								}
							?>	
						</select>	
						<select name="in_year" id="year" class="signup_field_year">	
							<?php
							for($year=1950; $year<=2014; $year++)
							{
								   echo "<option value="."'$year'".">". $year ."</option>";
							}
							?>	
						</select>
						*</td></tr>

					<tr><td class="signup_label">Gender:</td><td> 
						<select name="in_gender" id="gender" class="signup_field">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
						*</td></tr>

					<tr><td class="signup_label">E-mail Address:</td>
						<td><input type="text" name="in_email" value="<?php echo set_value('in_email'); ?>" class="signup_field" field="email" autocomplete="off"/></td>
					</tr>

					<tr><td class="signup_label">Contact Number:</td>
						<td><input type="text" name="in_contact_num" value="<?php echo set_value('in_contact_num'); ?>" class="signup_field" field="contact_num" autocomplete="off"/></td>
					</tr>

					<tr><td class="signup_label">Username:</td>
						<td><input type="text" name="in_username" value="<?php echo set_value('in_username'); ?>" class="signup_field" field="username" autocomplete="off"/>*</td>
						<td class="signup_error"><?php echo form_error('in_username'); ?></td>
					</tr>
					<tr><td></td></tr>

					<tr><td class="signup_label">Password:</td>
						<td><input type="password" name="in_password" class="signup_field" autocomplete="off"/>*</td>
						<td class="signup_error"><?php echo form_error('in_password'); ?></td>
					</tr>
					<tr><td></td></tr>

					<tr><td class="signup_label">Confirm Password:</td>
						<td><input type="password" name="in_confirmpassword" class="signup_field" autocomplete="off"/></td>
						<td class="signup_error"><?php echo form_error('in_confirmpassword'); ?></td>
					</tr>
					<tr><td></td></tr>
				</table>

				<input type="button" class="next_button" next="security" value="Next"><input type="reset" class="back_button" back="home" value="Cancel"/>
			</div>	

			<div class="signup_header" section="security">Security Details</div>
			<div id="security_form">
				<table>
					<tr><td class="signup_label">Select a Security Question:</td></tr>
					<tr><td>
						<select name="security_question" id="security_question" class="signup_field">
							<option value="What is your favorite color?"> What is your favorite color? </option>
							<option value="What is your middle name?"> What is your middle name? </option>
							<option value="Where is your birthplace?"> Where is your birthplace? </option>
							<option value="Where did you graduate high school?"> Where did you graduate high school? </option>
							<option value="What is the name of your first dog?"> What is the name of your first dog? </option>
							<option value=" What is the name of your father?"> What is the name of your father? </option>
							<option value="Where did you celebrate your first birthday?"> Where did you celebrate your first birthday? </option>
						</select>
					</td></tr>
					<tr><td class="signup_label">Security Answer:</td></tr>
					<tr><td><input type="text" name="security_answer" class="signup_field" field="security_answer" class="signup_field"></td></tr>
					<tr><td class="signup_error"><?php echo form_error('security_answer'); ?></td></tr>
				</table>
				<input type="button" class="next_button" next="confirm" value="Next"><input type="button" class="back_button" back="signup" value="Back"/>
			</div>

			<div class="signup_header" section="confirm">Confirm Details</div>
			<div id="confirm_form">
				<table>
					<tr><td class="signup_label">First Name </td><td class="signup_field"><span class="firstnameconfirm"><?php echo set_value('in_firstname'); ?></span></td></tr>
					<tr><td class="signup_label">Last Name </td><td class="signup_field"><span class="lastnameconfirm"><?php echo set_value('in_lastname'); ?></span></td></tr>
					<tr><td class="signup_label">Image </td><td class="signup_field"><span class="imageconfirm"></span></td></tr>
					<tr><td class="signup_label">Date of Birth </td><td class="signup_field"><span class="dobconfirm"></span></td></tr>
					<tr><td class="signup_label">Gender </td><td class="signup_field"><span class="genderconfirm"></span></td></tr>
					<tr><td class="signup_label">E-mail Address </td><td class="signup_field"><span class="emailconfirm"><?php echo set_value('in_email'); ?></span></td></tr>
					<tr><td class="signup_label">Contact Number </td><td class="signup_field"><span class="contact_numconfirm"><?php echo set_value('in_contact_num'); ?></span></td></tr>
					<tr><td class="signup_label">Username </td><td class="signup_field"><span class="usernameconfirm"><?php echo set_value('in_username'); ?></span></td></tr>
					<tr><td class="signup_label">Security Question </td><td class="signup_field"><span class="sqconfirm"></span></td></tr>
					<tr><td class="signup_label">Security Answer </td><td class="signup_field"><span class="security_answerconfirm"></span></td></tr>
				</table>
				<input type="submit" name="Signup" value="Sign Up" class="signup_submit"/><input type="button" class="back_button" back="security" value="Back"/>
			</div>
			</form>
		</div>
	</div>


</body>
</html>
