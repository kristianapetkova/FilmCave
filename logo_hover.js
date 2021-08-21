

window.onload = function(){ 
	var logo=document.getElementById("logo_picture");
	logo.onmouseover=function(){
		document.getElementsByClassName("st0").style.fill="white";
		document.getElementsByClassName("st1").style.fill="white";
		document.getElementsByClassName("st2").style.fill="white";
	}
	logo.onmouseout=function(){
		document.getElementsByClassName("st0").style.fill="#29BFCA";
		document.getElementsByClassName("st1").style.fill="#29BFCA";
		document.getElementsByClassName("st2").style.fill="#29BFCA";
	}
};