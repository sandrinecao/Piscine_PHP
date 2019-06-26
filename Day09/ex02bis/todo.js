$(document).ready(function() {
  $('#ft_list').html(getCookie('todolist'));

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

  $(document).on('click', '.todel', function removeTask() {
      if (confirm("You sure you wanna get rid of this?")) {
        $(this).remove();
        setCookie('todolist', $('#ft_list').html(), "");
    }
    return;
  });

  $('#button').on("click", function ask() {
    var to_do = prompt("Please enter your task");
    if (to_do == null || to_do == "")
      return;
    $('#ft_list').html('<div class="todel">' + to_do + '</div>' + $('#ft_list').html());
    setCookie('todolist', $('#ft_list').html(), "");
  });

});