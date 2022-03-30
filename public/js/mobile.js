  function setCookie(name, value) {
    document.cookie = name + "=" + value;
  }
  function getCookie(name) {
    var r = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
    if (r) return r[2];
    else return "";
  }
 

    if(window.innerWidth > 1000){
		
          setCookie("firstname", "desktop"); 
		  window.location.reload(true); 
        }