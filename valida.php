<?
if (session_status() !== PHP_SESSION_ACTIVE) {
   
    session_cache_expire(90);
    session_start();
//unset($_SESSION["PHP_SESSION_ACTIVE"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
//header("Location: index.php");
   //header('Content-type: application/pdf'); 
   //header('Content-Transfer-Encoding: binary');
   //header('Accept-Ranges: bytes');

$servidor ='172.17.0.3';

$cpf = $_POST["cpf_usu"];

$senha = $_POST["senha_usu"];

$ftpconn = ftp_connect($servidor) or die ("Erro ao acessar servidor $servidor");
$login_result = ftp_login($ftpconn, $cpf, $senha ) or die ("CPF ou senha incorretos");
$list = ftp_nlist($ftpconn, '');
    foreach ($list as $lista){

    }
   
}
   ftp_close($ftpconn);
?>


<!DOCTYPE html>
<html>
<title>Contra Cheque InovaceGroup</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Fechar &times;</button>
    <?
    foreach ($list as $lista) {
        echo '<a class="w3-bar-item w3-button" href="ftp://'.$servidor.'/'.basename($lista).'/">'.$lista.'</a>';
    }
    //echo '<p><tr><a href="ftp://'.$servidor.'/'.basename($lista).'">'.basename($lista).'</a></tr></p>';
    //echo "<table class=w3-bar-item w3-button; border=10; cellspacing=5; cellpading=10;>
    ?>
</div>
<div id="main">

<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h1>Contra Cheque InovaceGroup</h1>
  </div>
</div>
<img src="/imagens/login.jpg" style="width:100%">
<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>

</body>
</html>