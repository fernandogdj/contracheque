
<?PHP

//Iniciando a sessão:
if (session_status() !== PHP_SESSION_ACTIVE) {
   
   session_cache_expire(90);
   session_start();
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
    
    echo '<table style="font-family:"Courier New" font-size:"80%" font size="18" width="500" border="0" cellspacing="0" cellpadding="5">';
    echo '<font size="5" face="Courier New">';
    echo '<tr>';
    echo '<a href="ftp://'.$servidor.'/'.basename($lista).'"</a>';
    echo '<tr><b>Ano:</b></tr>';
    echo '</td>'.$lista.'</td>';
    echo '</tr>';
    //echo '</font>';
    echo '</table>';
    
   
     //echo"<table width="500" border="1" cellspacing="0" cellpadding="5">"
         //<tr>
           // <td>Ano:</td>'.$lista.'</td>
         //</tr>
     //"</table>"";

    }
   
}
   ftp_close($ftpconn);

