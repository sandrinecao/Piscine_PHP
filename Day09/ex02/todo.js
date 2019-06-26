window.onload = function(){
    document.getElementById("ft_list").innerHTML = getCookie('todolist');
}

function setCookie(cname, cvalue, exdays) {
  document.cookie = cname + "=" + cvalue + ";" + "";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
          c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
      }
  }
  return "";
}

function ask() {
    var to_do = prompt("Please enter your task");
    if (to_do == null || to_do == "")
      return;
  else {
      document.getElementById("ft_list").innerHTML = '<div onclick="removeTask(this)">' + to_do + '</div>' + document.getElementById("ft_list").innerHTML;
      setCookie('todolist', document.getElementById('ft_list').innerHTML, "");
  }

}

function removeTask(elem){
    if (confirm("You sure you wanna get rid of this?")) {
        elem.parentNode.removeChild(elem);
        setCookie('todolist', document.getElementById('ft_list').innerHTML, "");
    }
    return;
}