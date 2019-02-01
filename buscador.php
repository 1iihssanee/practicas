
<style type="text/css">
    body p {
        font-family: Verdana, Geneva, sans-serif;
    }
</style>
<form name="form1" method="post" action="buscador.php" id="cdr" >
    <h3>Buscar Cliente  </h3>
    <p>
        <input name="busca"  type="text" id="busqueda">
        <input type="submit" name="Submit" value="buscar" />
    </p>
    </p>
</form>
<p>
    <style type="text/css">
        input{outline:none;border:0px;}
        #busqueda{background: #efa1d6;color:#fff;}
        #cdr{padding:5px;background: #801148;width:220px;border-radius:10px 0px 0px 10px;}
        #tab{background: #efa1d6;;border-radius:10px 10px 10px 10px;}
    </style>

    <?php
    $busca="";
    $busca=$_POST['busca'];
    mysql_connect("localhost","mensageria","mensageria");
    mysql_select_db("mensageria");//nombre de la base de datos
    if($busca!=""){
    $busqueda=mysql_query("SELECT * FROM usuarios WHERE username LIKE '%".$busca."%'");//cambiar nombre de la tabla de busqueda
    ?>
<table width="1166" border="1" id="tab">
    <tr>
        <td width="19">usuario </td>

    </tr>

    <?php

    while($f=mysql_fetch_array($busqueda)){
        echo '<tr>';

        echo '<td width="157">'.$f['username'].'</td>';

        echo '</tr>';

    }

    }
    ?>
</table>

