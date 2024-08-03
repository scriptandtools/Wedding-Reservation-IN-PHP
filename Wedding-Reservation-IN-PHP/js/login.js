function login_account()
{
  var msg = "";
  var user = document.getElementById("luser").value;
  var pass = document.getElementById("lpass").value;
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        if (this.responseText != "")
        {
          document.getElementById("login_error").innerHTML = this.responseText;
        }
        else
        {
          location.reload();
        }
      }
  };
  xmlhttp.open("GET", "global.php?lu="+user+"&lp="+pass, true);
  xmlhttp.send();
}

function logout_account()
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        location.reload();
      }
  };
  xmlhttp.open("GET", "global.php?logout=ok", true);
  xmlhttp.send();
}

$("#reservationModal").on('show.bs.modal', function (){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        document.getElementById("bod").innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET", "global.php?fill=ok", true);
  xmlhttp.send();
});

$("#reservedModal").on('show.bs.modal', function (){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        document.getElementById("bod1").innerHTML = this.responseText;
      }
  };
  xmlhttp.open("GET", "global.php?fill1=ok", true);
  xmlhttp.send();
});

function acceptRes(data)
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        location.reload();
      }
  };
  xmlhttp.open("GET", "global.php?updateRes="+data, true);
  xmlhttp.send();
}

function deleteRes(data)
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        location.reload();
      }
  };
  xmlhttp.open("GET", "global.php?deleteRes="+data, true);
  xmlhttp.send();
}

function cancelRes(data)
{
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200)
      {
        location.reload();
      }
  };
  xmlhttp.open("GET", "global.php?cancelRes="+data, true);
  xmlhttp.send();
}
