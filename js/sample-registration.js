function formValidation()
{
var usr = document.registration.username;
var fname = document.registration.firstname;
var lname = document.registration.lastname;
var uemail = document.registration.email;
var pass = document.registration.pass;
var passv = document.registration.passv;

if(username_validation(usr,5,12)){
	if(fname_validation(fname,3,12)){
		if(lname_Validation(lname,3,15)){
			if(ValidateEmail(uemail)){
				if(pass_validation(pass,7,15)){
					if(passv_Validation(pass,passv)){
} } } } }
return false;
}
else
{
return true;
}

function username_validation(usr,mx,my){
	var usr_len = usr.value.length;
	if (usr_len == 0 || usr_len >= my || usr_len < mx){
		document.getElementById("uerror").style.display="inline";
		return false;
	}
	return true;
}
function passid_validation(passid,mx,my){
	var passid_len = passid.value.length;
	if (passid_len == 0 ||passid_len >= my || passid_len < mx){
		document.getElementById("perror").style.display="inline";
	return false;
	}
	return true;
}
function ValidateEmail(uemail){
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(uemail.value.match(mailformat)){
		return true;
	}
	else{
		document.getElementById("eerror").style.display="inline";
		return false;
	}
}
}