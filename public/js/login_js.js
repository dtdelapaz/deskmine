	
$(document).ready(function(){

		



	/*Display the inputted details
		$('#firstname').on('input', function(){
			var val = $('#firstname').val();
			$('.firstnameconfirm').html(val);
		});

		$('#lastname').on('input', function(){
			var val = $('#lastname').val();
			$('.lastnameconfirm').html(val);
		})

		$('#image').focusout(function(){
			var val = $('#image').val();
			$('.imageconfirm').html(val);
		})

		
		var val = $('#month').val() + "-" + $('#day').val() + "-" + $('#year').val();
		$('.dobconfirm').html(val);

		$('#month, #day, #year').change(function(){
			var val = $('#month').val() + "-" + $('#day').val() + "-" + $('#year').val();
			$('.dobconfirm').html(val);
		});

		var val = $('#gender').val();
		$('.genderconfirm').html(val);

		$('#gender').change(function(){
			var val = $('#gender').val();
			$('.genderconfirm').html(val);
		})


		$('#email').on('input', function(){
			var val = $('#email').val();
			$('.emailconfirm').html(val);
		})

		$('#contact_num').on('input', function(){
			var val = $('#contact_num').val();
			$('.contact_numconfirm').html(val);
		})

		$('#username').on('input', function(){
			var val = $('#username').val();
			$('.usernameconfirm').html(val);
		})

		var val = $('#security_question').val();
		$('.sqconfirm').html(val);
		
		$('#security_question').change(function(){
			var val = $('#security_question').val();
			$('.sqconfirm').html(val);
		});

		$('#security_question').focusout(function(){
			var val = $('#security_question').val();
			$('.sqconfirm').html(val);
		})

		$('#security_answer').on('input', function(){
			var val = $('#security_answer').val();
			$('.saconfirm').html(val);
		})
	END of Display the inputted details*/

				
	//function to get the Cookies
	function getCookies(name){
		var cookies = document.cookie;
		var cookie = cookies.split(';');
		for(var i=0; i<cookie.length; i++){
			var parts = cookie[i].split('=');
			var label = $.trim(parts[0]);
			var value = $.trim(parts[1]);
			if(label == name && value == 'submitted'){
				document.cookie="login=notsubmitted";
				document.cookie="signup=notsubmitted";
				return true;
			}
		}
	}

//LOGIN FORM JS
	//check if the signup form is submitted. if it is, show form for resubmission
	var signup_result = getCookies("signup");
	if(signup_result == true){
		$('#signup_sec').css({left:'0%'});
		$('#logo').css({margin:'0'});
		$('#signup_button').hide();
		$('#signup_bg_cover').css({opacity:'0'})
		$('#container_signup').attr('visibility', 'visible');
	};


	//check if the login form is submitted. if it is, show form for resubmission
	$('#invalid_login').hide();
	var login_result = getCookies("login");
	if(login_result == true){
		$('#login_sec').css({right:'0%'});
		$('#logo').css({margin:'0 0 0 50%'});
		$('#login_button').hide();
		$('#invalid_login').slideDown(400);
		$('#container_login').attr('visibility', 'visible');
	};

	//set a cookie when login form is submitted
	$('.login_submit').on('click', function(){
			document.cookie="login=submitted";
		});

	//Hide and slide the login form when "Log in" is clicked
		$('#login_button').on('click', function(){
			$('#login_button').fadeOut(600);
			$('#login_sec').animate({right:'0%'}, 600);
			$('#logo').animate({margin:'0 0 0 50%'}, 600);
			$('#container_login').attr('visibility', 'visible');

			var visibility = $('#container_signup').attr('visibility');
			if(visibility == "visible"){
				$('#signup_sec').animate({left:'100%'}, 600);
				$('#signup_button').fadeIn(600);
				$('#signup_bg_cover').animate({opacity:'1'}, 400);
				$('#container_signup').attr('visibility', 'hidden');
			}
		});


		$('.cancel_login').on('click', function(){
			$('#login_button').fadeIn(600);
			$('#login_sec').animate({right:'100%'}, 600);
			$('#logo').animate({margin:'0 0 0 25%'}, 600);
			$('#invalid_login').hide();
			$('#container_login').attr('visibility', 'hidden');
		});

	

//SIGNUP FORM JS

	//set a cookie when signup form is submitted
	$('.signup_submit').on('click', function(){
			document.cookie="signup=submitted";
	});

	//Hide and slide the signup form when "Sign Up" is clicked
		$('#signup_button').on('click', function(){
				/*$('#login_sec').animate({right:'0%'}, 600);*/
				$('#signup_button').fadeOut(600);
				$('#signup_sec').animate({left:'0%'}, 600);
				$('#logo').animate({margin:'0'}, 600);
				$('#signup_bg_cover').animate({opacity:'0'}, 400);
				$('#container_signup').attr('visibility', 'visible');

				var visibility = $('#container_login').attr('visibility');
				if(visibility == "visible"){
					$('#login_button').fadeIn(600);
					$('#login_sec').animate({right:'100%'}, 600);
					$('#container_login').attr('visibility', 'hidden');
				}
		});


	//copy the values being inputted by the user and show them on a different section of the page(Confirm section)
		$('.signup_field').on('input', function(){
				var field = $(this).attr('field');
				var val = $(this).val();
				$('.'+field+'confirm').html(val);
			});
		//FOR DROPDOWNS
		var val = $('#month').val() + "-" + $('#day').val() + "-" + $('#year').val();
		$('.dobconfirm').html(val);

		$('#month, #day, #year').change(function(){
			var val = $('#month').val() + "-" + $('#day').val() + "-" + $('#year').val();
			$('.dobconfirm').html(val);
		});

		var val = $('#gender').val();
		$('.genderconfirm').html(val);

		$('#gender').change(function(){
			var val = $('#gender').val();
			$('.genderconfirm').html(val);
		});

		var val = $('#security_question').val();
		$('.sqconfirm').html(val);

		$('#security_question').change(function(){
			var val = $('#security_question').val();
			$('.sqconfirm').html(val);
		});



	//animate the signup form
		$('#security_form').hide();
		$('#confirm_form').hide();

		//when a header is clicked, it will show the form under it
		$('.signup_header').on('click', function(){
			var section = $(this).attr('section');
			var form = '#' + section + '_form';
			$(form).slideToggle(300);

			//after showing the form, it will search for the remaining headers and hide the forms under them
			$('.signup_header').each(function(index){
				var section2 = $(this).attr('section');
				var form2 = '#' + section2 + '_form';
				
				if(form2 != form){
					$(form2).hide(300);
					$(form).animate({height:'77%'}, 300);
				};
			});

		});


		//when clicking the next button
		$('.next_button').on('click', function(){
			var next = $(this).attr('next');
			var form = '#' + next + '_form';
			$(form).slideToggle(300);

			$('.signup_header').each(function(index){
				var section2 = $(this).attr('section');
				var form2 = '#' + section2 + '_form';
				
				if(form2 != form){
					$(form2).hide(300);
					$(form).animate({height:'77%'}, 300);
				};
			});
		});

		//when clicking the back button
		$('.back_button').on('click', function(){
			//get the name of the previous form
			var back = $(this).attr('back');
			var form = '#' + back + '_form';
			$(form).slideToggle(300);

			//identify the other forms that needs to be closed
			$('.signup_header').each(function(index){
				var section2 = $(this).attr('section');
				var form2 = '#' + section2 + '_form';
				
				if(form2 != form && back != 'home'){
					$(form2).hide(300);
					$(form).animate({height:'77%'}, 300);
				};

				if(form2 != form && back == 'home'){
					$('#signup_sec').animate({left:'100%'}, 600);
					$('#logo').animate({margin:'0 0 0 25%'}, 600);
					$('#signup_button').fadeIn(600);
					$('#signup_bg_cover').animate({opacity:'1'}, 400);
					$('#container_signup').attr('visibility', 'hidden');
				};
			});
		});

});
