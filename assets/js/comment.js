function insertComment()
{
var ID = formKomen.ID.value;
var nama = formKomen.Nama.value;
var email = formKomen.Email.value;
var komentar = formKomen.Komentar.value;

if(!validateEmail(email)){
	alert("Alamat email yang anda masukkan tidak valid!!");
	return false;
}
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("komentar_baru").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","komentar.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("post_id="+ID+"&Nama="+nama+"&Email="+email+"&Komentar="+komentar);

document.formKomen.Nama.value ="";
document.formKomen.Email.value ="";
document.formKomen.Komentar.value ="";
}
function loadComment(){
	var ID = formKomen.ID.value;
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    {
	    document.getElementById("komentar").innerHTML=xmlhttp.responseText;
	    }
	  }
	xmlhttp.open("GET","load_komentar.php?post_id="+ID,true);
	xmlhttp.send();
}

function validateEmail(email) { 
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}