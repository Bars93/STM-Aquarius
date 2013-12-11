function valid() {
	var v_email = function() {
		var el = document.getElementById("login_email");
		var el_msg = document.getElementById("uemail_err");
		if(el.value != "") {
			var regexp = /.@./;
			if (regexp.test(el.value)) {
				//emlst_elem.src = "img/ok.png";
				el.style.backgroundImage="url(img/ok.png)";
				el_msg.style.visibility="hidden";
				el_msg.style.height="1px";
				return true;
			}
			else {
				el.style.backgroundImage="url(img/err.png)";
				el_msg.style.visibility="visible";
				el_msg.style.height="40px";
				//emlst_elem.src = "img/err.png";
				return false;
			}
		}
		else
			el.style.backgroundImage="none";
		return false;
	};
	var v_passw = function() {
		var els = document.getElementById("login_pw");
		var el_msg = document.getElementById("upw_err");
		if(els.value != "") {
			 var regexp = /(?!^[0-9]*$)(?!^[a-zA-Z!@#$%^&*()_+=<>?]*$)^([a-zA-Z!@#$%^&*()_+=<>?0-9]{6,})$/;
			 if (regexp.test(els.value)) {
				els.style.backgroundImage="url(img/ok.png)";
				el_msg.style.visibility="hidden";
				el_msg.style.height="1px";
				return true;
			}
			else {
				els.style.backgroundImage="url(img/err.png)";
				el_msg.style.visibility="visible";
				el_msg.style.height="40px";
				return false;
			}
		}
		else
			els.style.backgroundImage="none";
		
	};
	var v_cpassw = function() {
		var el = document.getElementById("login_pw");
		var elr = document.getElementById("login_cpw");
		var el_msg = document.getElementById("cpw_err");
		if(elr.value != "") {
			if(el.value == elr.value && v_passw()) {
				elr.style.backgroundImage="url(img/ok.png)";
				el_msg.style.visibility="hidden";
				el_msg.style.height="1px";
				return true;
			}
			else {
				elr.style.backgroundImage="url(img/err.png)";
				el_msg.style.visibility="visible";
				el_msg.style.height="40px";
				return false;
			}
		}
		else 
			elr.style.backgroundImage="none";
		return false;
	};
	v_email();
	v_passw();
	v_cpassw();	
}