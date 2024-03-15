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


<div style="width: 100%; background-color: #8AB594; height: 100vh; border-radius: 50px 50px 0 0;">


    <div style="padding: 30px 30px 20px 30px; width:100%; height: 5%; display: flex; text-align:center; align-items: center; justify-content: center;">

        <span style="font-weight: bold; color:#362B1D; font-size: 20px;">Bem Vindo!</span>

    </div>

    <div style="padding: 30px 30px 20px 30px; width:100%; height: 5%; display: flex; text-align:center; align-items: center; justify-content: center;">

    <span style="font-weight: bold; color:#44604A; font-size: 20px; text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);">Santo Rancho</span>

    </div>

    <div style="padding: 30px 30px 30px 30px; width:100%;">

        <div class="row">
            
            <div style="padding: 5px 30px 5px 30px; width:100%;">

                <div style="width: calc(50% - 5px); height: 150px; float: left; border: solid 1px #44604a63; border-radius: 10px; margin-right: 10px; background-color: #44604a63; ">
                    <div style="width: 100%; height: 20%; text-align: center;"><span style="font-weight: bold; color:#212529; font-size: 20px; text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);">Novo Animal</span></div>
                    <div style="width: 100%; height: 80%; font-size: 80px; text-align: center; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-cow"></i>
                    </div>
                </div>

                <div style="width: calc(50% - 5px); height: 150px; float: left; border: solid 1px #44604a63; border-radius: 10px; background-color: #44604a63;">
                    <div style="width: 100%; height: 20%; text-align: center;"><span style="font-weight: bold; color:#212529; font-size: 20px; text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);">Consultar</span></div>
                    <div style="width: 100%; height: 80%; font-size: 80px; text-align: center; display: flex; align-items: center; justify-content: center;">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>

            </div>


        </div>

        <div class="div_br"></div>
        <div class="div_br"></div>


        <div class="centralizar">
        <span style="font-weight: bold; color:#44604A; font-size: 20px; text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);">DashBoard</span>
        </div>

        <div class="div_br"></div>
        <div class="div_br"></div>

        <div style="border: solid 1px #44604a63; border-radius: 10px; margin-right: 10px; background-color: #44604a63;">
        <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>


    
    
    <!--<section class="section">
    <div class="container">

      <div class="columns">

            <div class="column is-four-fifths">

            <video autoplay id="video"></video>

            <button class="button is-hidden" id="btnPlay">

                <span class="icon is-small">
                <i class="fas fa-play"></i>
                </span>

            </button>

            <button class="button" id="btnChangeCamera">
                <span class="icon">
                <i class="fas fa-sync-alt"></i>
                </span>
                <span>Switch camera</span>
            </button>
            </div>


      </div>

    </div>

  </section>-->
</div>


<script>

     // Dados do gráfico
     var data = {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho'],
        datasets: [{
            label: 'Vendas',
            data: [12, 19, 3, 5, 2, 25, 35],
            backgroundColor: '#362b1dd6', // Cor de fundo
            borderColor: '#362b1dd6', // Cor da borda
            borderWidth: 1
        }]
    };

    // Opções de configuração do gráfico

    var options = {
        plugins: {
            legend: {
                labels: {
                    color: 'white' // Define a cor do texto da label
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true
            },
            x: {
                ticks: {
                    color: 'white' // Define a cor do texto dos rótulos do eixo x
                }
            }
        }
    };

    // Criar o gráfico
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico (pode ser 'bar', 'line', 'pie', etc.)
        data: data,
        options: options
    });



    function ExitTheSystem() {

        setTimeout(function() {

            // Redirecionar para outra página
            window.location.href = "index.php";

        }, 1000);

    }


    (function () {

        if(
            !"mediaDevices" in navigator ||
            !"getUserMedia" in navigator.mediaDevices
        ) {
            alert("Serviço de Camera Não suportado!");
            return;
        }

        // get page elements
        const video = document.querySelector("#video");
        const btnPlay = document.querySelector("#btnPlay");
        const btnChangeCamera = document.querySelector("#btnChangeCamera");
        const devicesSelect = document.querySelector("#devicesSelect");

        // video constraints
        const constraints = {

            video: {
            width: {
                min: 1280,
                ideal: 1920,
                max: 2560,
            },

            height: {
                min: 720,
                ideal: 1080,
                max: 1440,
            },
            },

        };

        // Camera Frontal
        let useFrontCamera = true;

        // Camera Traseira
        let videoStream;

        // handle events
        // play
        btnPlay.addEventListener("click", function () {
            video.play();
            btnPlay.classList.add("is-hidden");
            btnPause.classList.remove("is-hidden");
        });


        // switch camera
        btnChangeCamera.addEventListener("click", function () {
            useFrontCamera = !useFrontCamera;

            initializeCamera();
        });

        // stop video stream
        function stopVideoStream() {
            if (videoStream) {
            videoStream.getTracks().forEach((track) => {
                track.stop();
            });
            }
        }

        // initialize
        async function initializeCamera() {
            stopVideoStream();
            constraints.video.facingMode = useFrontCamera ? "user" : "environment";

            try {
            videoStream = await navigator.mediaDevices.getUserMedia(constraints);
            video.srcObject = videoStream;
            } catch (err) {
            alert("Could not access the camera");
            }
        }

    initializeCamera();

})();



</script>

<?php


    include 'rodape.php';


?>