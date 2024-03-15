<?php

    include 'cabecalho.php';
    include 'conexao_pgsql.php';

    $sessionid = $_SESSION['usuario'];
    $sessionidCode = $_SESSION['id'];

    $consultaAcess = "SELECT acess.ID_NIVEL_ACESSO
                      FROM nivelacessousuario acess
                      WHERE acess.ID_usuario = $sessionidCode";

    $resultadoAcess = pg_query($conn, $consultaAcess);      
    
    $validadorAcess = pg_num_rows($resultadoAcess);

    if($validadorAcess == 0){

        echo 'Você Não Possui acesso aos Modulos! Contate o Administrador.';

    } else {

        $acessos = array(); 

        // Loop através das linhas do resultado
        while($linha = pg_fetch_assoc($resultadoAcess)){

            // Acesse cada coluna pelo nome da coluna
            $id_nivel_acesso = $linha['id_nivel_acesso'];

            // Adicione o ID de nível de acesso ao array de acessos
            $acessos[] = $id_nivel_acesso;

        }

        // Atribua o array de acessos à session
        $Acess = $_SESSION['acessos'] = $acessos;

    }
    
?>

<div class="div_br"></div>


<div class="div_br"></div>
<div class="div_br"></div>

<div style="width: 100%; background-color: #f8f6f6; min-height: 100%; padding: 1% 5% 5% 5%;">

    <div class="row">
            
        <label style="font-size: 17px; color: #a9a9a9; font-weight: bold;">Administração</label>
        <div class="efeito-zoom mr-3 mt-3" style="border-radius: 10px; cursor: pointer; width: 160px; height: 140px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; ">

            <div style="width: 100%; height: 20%; text-align: center; padding-top: 5%;">Configurações</div>
            <div onclick="redirect_user(1)" style="width: 100%; height: 80%; position: relative;">
                <div style=" color: #46606E;width: 100%; position: absolute; bottom: 0; padding-left: 10%; padding-bottom: 3%; font-size: 45px;">
                    <i class="fa-solid fa-gear"></i>
                </div>
            </div>

        </div>

        <div class="efeito-zoom mr-3 mt-3" style="border-radius: 10px; margin-left: border-radius: 10px; cursor: pointer; width: 160px; height: 140px; box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; ">

            <div style="width: 100%; height: 20%; text-align: center; padding-top: 5%;">Metas</div>
            <div onclick="redirect_user(2)"style="width: 100%; height: 80%; position: relative;">
                <div style="color: #46606E; width: 100%; position: absolute; bottom: 0; padding-left: 10%; padding-bottom: 3%; font-size: 45px;">
                    <i class="fa-solid fa-hand-holding-dollar"></i>
                </div>
            </div>

        </div>


    </div>
</div>





<script>


    function ExitTheSystem() {

        setTimeout(function() {

            // Redirecionar para outra página
            window.location.href = "index.php";

        }, 1000);

    }

    function redirect_user(parameter){

        if(parameter == 1){

            window.location.href = "configuracoes.php";

        }
    }

</script>

<?php


    include 'rodape.php';


?>