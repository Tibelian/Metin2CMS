function reloadPage(){
	var dots = document.getElementById("dots");
	setTimeout(function(){
		dots.innerHTML = ".";
	}, 500);

	setTimeout(function(){
		dots.innerHTML = "..";
	}, 1000);

	setTimeout(function(){
		dots.innerHTML = "...";
	}, 1500);

	setTimeout(function(){
		location.href = "./";
	}, 2000);
}

function login(){
	
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var remember = document.getElementById("remember").checked;
	var login_form = document.getElementById("login_form");
	var login_response = document.getElementById("login_response");
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			
			login_response.innerHTML = this.responseText;
			login_form.reset();
			if(document.getElementById('dots')){
				reloadPage();
			}
			
		}
	};
	
	var postContent = "username="+ username +"&password="+ password;
	
	if(remember){
		postContent += "&remember=true";
	}
	
	xhttp.open("POST", url+"admin_ajax.php?action=login", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(postContent);
}

function lost_pw(){
	
	var username = document.getElementById("lost_username").value;
	var email = document.getElementById("lost_email").value;
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("response-lost").innerHTML = this.responseText;
			document.getElementById("lost_form").reset();
		}
	};
	
	var postContent = "lost_username="+ username +"&lost_email="+ email;
	
	xhttp.open("POST", url+"admin_ajax.php?action=lost-pw", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(postContent);
}

function status(x){
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("status-"+x).innerHTML = this.responseText;
		}
	};
	
	
	xhttp.open("GET", url+"admin_ajax.php?action=status&a="+x, true);
	xhttp.send();
}

function sendSupport(){
	
	var responseArea = document.getElementById("support-response");
	
	responseArea.innerHTML = "";
	
	var author = document.getElementById("author").value;
	var subject = document.getElementById("subject").value;
	var message = document.getElementById("message").value;
	
	var x = "author="+author+"&subject="+subject+"&message="+message;
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			responseArea.innerHTML = this.responseText;
		}
	};
	
	
	xhttp.open("POST", url+"admin_ajax.php?action=support", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(x);
}

function ranking(start, limit, top, type){
	
	if(type){
		var parametersGET = "start="+start+"&limit="+limit+"&top="+top+"&type=1";
		var rankingArea = "ranking";
	}else{
		var parametersGET = "start="+start+"&limit="+limit+"&top="+top;
		var rankingArea = "ranking-top";
	}
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById(rankingArea).innerHTML = this.responseText;
			if(type){
				if(start <= 0){
					var prev ="<button class='btn btn-prev btn-disabled' disabled></button>";
				}else{
					var prev ="<button class='btn btn-prev' onclick='ranking("+(start-20)+", "+limit+", '"+top+"', "+type+")'></button>";
				}
				var next ="<button class='btn btn-next' onclick='ranking("+(start+20)+", "+limit+", '"+top+"', "+type+")'></button>";
				var rankingBtn = document.getElementById("ranking-button");
				rankingBtn.innerHTML = prev+next;
			}
		}
	};
	
	xhttp.open("GET", url+"admin_ajax.php?action=ranking&"+parametersGET, true);
	xhttp.send();
}
function showRanking(top){
	
	ranking(0, 20, top, true);
	
	document.getElementById("btn-ranking-players").style.backgroundColor = "transparent";
	document.getElementById("btn-ranking-players").style.color = "#678532";
	document.getElementById("btn-ranking-guilds").style.backgroundColor = "transparent";
	document.getElementById("btn-ranking-guilds").style.color = "#678532";
	
	top = document.getElementById("btn-ranking-"+top);
	
	top.style.backgroundColor = "#678532";
	top.style.color = "#000";
	
}


function register(){
	
	var reg_username = document.getElementById("reg_username").value;
	var reg_pass = document.getElementById("reg_password").value;
	var reg_pass2 = document.getElementById("reg_password2").value;
	var reg_email = document.getElementById("reg_email").value;
	var reg_security = document.getElementById("reg_security").value;
	var reg_terms = document.getElementById("reg_terms").checked;
	var response_area = document.getElementById("register_response");
	var register_form = document.getElementById("register_form");
	
	var error_msg = 0;
	
	if(reg_terms){
	if(reg_username.length > 5){
	if(reg_pass.length > 3){
	if(reg_pass == reg_pass2){
	if(reg_email.length > 8 && reg_email.includes("@")){
	if(reg_security.length == 7){
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200){
				
				response_area.innerHTML = this.responseText;
				register_form.reset();
				
			}
		};
		
		var postContent = "login="+ reg_username +"&pw1="+ reg_pass + "&pw2="+ reg_pass2 + "&email="+ reg_email + "&code="+ reg_security + "&rules=true";
		
		xhttp.open("POST", url+"admin_ajax.php?action=register", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send(postContent);
		
	}else{
		error_msg = "El código secreto debe de estar formado por 7 carácteres";
	}
	}else{
		error_msg = "El correo electrónico no es válido";
	}
	}else{
		error_msg = "Las contraseñas no coinciden";
	}
	}else{
		error_msg = "La contraseña no cumple con los requisitos mínimos";
	}
	}else{
		error_msg = "El nombre de usuario no cumple con los requisitos mínimos";
	}
	}else{
		error_msg = "Debes aceptar nuestro términos y condiciones";
	}
	
	
	if(error_msg != 0){
		response_area.innerHTML = '<div class="alert alert-warning alert-dismissible fade show" role="alert">'+error_msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
	}
}






// EVENTO PARA ENVIAR FORMULARIO CON INTRO EN EL REGISTRO
if(document.getElementById("register_form")){
	
	var register_form = document.getElementById("register_form");
	register_form.addEventListener("keyup", function(event){
		event.preventDefault();
		if(event.keyCode === 13){
			document.getElementById("create_account").click();
		}
	});
	
}

// EVENTO PARA ENVIAR FORMULARIO CON INTRO EN EL LOGIN
if(document.getElementById("login_form")){
	
	var login_form = document.getElementById("login_form");
	login_form.addEventListener("keyup", function(event){
		event.preventDefault();
		if(event.keyCode === 13){
			document.getElementById("login_button").click();
		}
	});
	
}


function settingsForm(x){
	
	var tagForm = document.getElementById("form_"+x);
	var tagResponse = document.getElementById("response-options");
	
	tagResponse.innerHTML = "Aplicando cambios...";
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			
			tagResponse.innerHTML = this.responseText;
			
		}
	};
	
	var postContent = new FormData(tagForm);
	
	xhttp.open("POST", url+"admin_ajax.php?action=settings", true);
	xhttp.send(postContent);
}