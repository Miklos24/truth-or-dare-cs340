<html>
<head>
<title>Sign Up</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

function hideErrors() {
		$("input[name='name']").attr("class", "");
		$("#username-err").css("visibility", "hidden");
		$("input[name='email']").attr("class", "");
		$("#email-err").css("visibility", "hidden");
		$("input[name='password']").attr("class", "");
		$("#pass-err").css("visibility", "hidden");
		$("input[name='password-conf']").attr("class", "");
		$("#pass-conf-error").css("visibility", "hidden");
}

function valid() {
	v = true; // make false if any errors visible
	if (!$("input[name='username']").val()) {
		$("input[name='name']").attr("class", "invalid");
		$("#username-err").html("Please enter your username");
		$("#username-err").css("visibility", "visible");
		v = false;
	} else {
		$("input[name='name']").attr("class", "");
		$("#name-err").css("visibility", "hidden");
	}
	if (!$("input[name='email']").val()) {
		$("input[name='email']").addClass("invalid");
		$("#email-err").html("Please enter your email");
		$("#email-err").css("visibility", "visible");
		v = false;
	} else {
		$("input[name='email']").attr("class", "");
		$("#email-err").css("visibility", "hidden");
	}
	if (!$("input[name='password']").val()) {
		$("input[name='password']").addClass("invalid");
		$("#pass-err").html("Please enter a password");
		$("#pass-err").css("visibility", "visible");
		v = false;
	} else {
		$("input[name='password']").attr("class", "");
		$("#pass-err").css("visibility", "hidden");
	}
	if (!$("input[name='password-conf']").val()) {
		$("input[name='password-conf']").addClass("invalid");
		$("#pass-conf-err").html("Please confirm your password");
		$("#pass-conf-err").css("visibility", "visible");
		v = false;
	} else {
		$("input[name='password-conf']").attr("class", "");
		$("#pass-conf-err").css("visibility", "hidden");
	}
	if ($("input[name='password']").val() != $("input[name='password-conf']").val()) {
		$("input[name='password-conf']").addClass("invalid");
		$("#pass-conf-err").html("Passwords do not match");
		$("#pass-conf-err").css("visibility", "visible");
		v = false;
	}
	return v;
}

function handle(x) {
	switch (x.trim()) {
		case "invalid_username":
			$("#username-err").html("Enter a valid username");
			$("#username-err").css("visibility", "visible");
			break;
		case "unsupported_chars_username":
			$("#username-err").html("Your username has unsupported characters");
			$("#username-err").css("visibility", "visible");
			break;
		case "invalid_email":
			$("#email-err").html("Enter a valid email");
			$("#email-err").css("visibility", "visible");
			break;
		case "email_exists":
			$("#email-err").html("This email is already in use");
			$("#email-err").css("visibility", "visible");
			break;
		case "pass_too_short":
			$("#pass-err").html("Your password is too short");
			$("#pass-err").css("visibility", "visible");
			break;
	}
}

$("document").ready(function() { // have to do everything when the document is loaded
    $("#register-button").on("click", function(e) {

	if (!valid())
		return false;

    var form = $("#attempt-register");

	var dat = {};

	form.serializeArray().map(function(x){dat[x.name]=x.value;});

	console.log(JSON.stringify(dat));

        $.ajax({
            type: "POST",
            url: "register.php", // TODO: Change this file
            data: JSON.stringify(dat),
            success: function(resp) {
				var parsed = JSON.parse(resp);
				console.log(parsed);
				if (parsed == "success") {
					hideErrors();
					window.location.replace("https://web.engr.oregonstate.edu/~dapranod/truth-or-dare-cs340/pages/homepage.php");
					return;
                } else if (parsed == "error") {
                    alert("There was an error creating your account. Please try again later.");
                }
				if (parsed instanceof Array) { // loops through and displays all of the errors
					for (var i = 0; i < parsed.length; i++) {
						x = parsed[i];
						handle(x.trim());
					}
				}
            }
        });
        return false;
    });
});
</script>
<style>
body {
	font-family: Helvetica Neue,Helvetica,Arial,sans-serif; 
    margin: 0;
    background-color: #192841;
	background-image: linear-gradient(to top right, #3dc431, #192841);
}
#attempt-register {
    margin: 0;
    margin-top: 44px;
    text-align: center;
}
#registration-panel {
	box-shadow: 0 4px 20px -4px #555;
    position: absolute;
    top: 450px;
    margin-top: -240px;
    right: 15%;
    background-color: #fff;
    width: 320px;
    height: 450px;
    border: 1px solid #fff;
}
#attempt-register>input[type=text] {
    color: #111;
    width: 240px;
    height: 34px;
    border: 1px #666 solid;
    margin-bottom: 10px;
    border-radius: 4px;
    padding: 4px 6px;
}
#attempt-register>input[type=password] {
    color: #111;
    width: 240px;
    height: 34px;
    border: 1px #666 solid;
    margin-bottom: 10px;
    border-radius: 4px;
    padding: 4px 6px;
}
#attempt-register>input[type=submit] {
    border-radius: 4px;
    border: none;
    background-color: #4da845;
    width: 72px;
    height: 32px;
    color: #fff;
    margin-top: 10px;
}
#attempt-register>a {
	display: block;
	font-size: 14px;
	margin-top: 20px;
}
#attempt-register>span {
	display: block;
	margin-bottom: -16px;
}
#app-promo-bar {
    position: absolute;
    top: 820px;
    width: 100%;
    text-align: center;
}
#app-promo-bar>img {
    height: 64px;
    margin-left: 24px;
}
#logo {
    position: absolute;
    top: 200px;
    left: 10%;
    color: #fff;
    font-size: 80px;
	font-weight: bold;
}
#flavor {
    position: absolute;
    top: 280px;
    left: 10.25%;
    color: #fff;
    font-size: 32px;
	font-weight: bold;
}
.err {
	visibility: hidden;
	display: inline-block;
	width: 100%;
	margin-left: 42px;
	text-align: left;
	color: #AA0B00;
	font-size: 14px;
}
.invalid {
	border: 1px solid #AA0B00 !important;
}
.invalid::placeholder {
	color: #AA0B00;
}
</style>
</head>
    <body>
    <span id="logo">Truth or Dare</span>
    <span id="flavor">Challenge your friends.</span>
        <div id="registration-panel">
        <form id="attempt-register">
            <span style="font-size: 24px;">Register</span><br>
            <span class="err" id="username-err">!</span><br>
            <input type="text" name="username" placeholder="Username"><br>
            <span class="err" id="email-err">!</span><br>
            <input type="text" name="email" placeholder="Email Address"><br>
            <span class="err" id="pass-err">!</span><br>
            <input type="password" name="password" placeholder="Password"><br>
            <span class="err" id="pass-conf-err">!</span><br>
            <input type="password" name="password-conf" placeholder="Confirm Password"><br>
            <input type="submit" id="register-button" value="Register"><br>
            <a href="signin.php">Already registered? Log in</a>
        </form>
        </div>
    </body>
</html>