<?php

    include 'cabecalho.php';

?>

    <div class="div_br"> </div>

    <div class='espaco_pequeno'></div>

    <h27><a href="home.php" style="color: #444444; text-decoration: none;"><i class="fa fa-reply efeito-zoom" aria-hidden="true"></i> Voltar</a></h27>

    <div class="div_br"> </div>  
    <div class="div_br"> </div>


    <div style="background-color: #f1eeee; border: solid 1px #f1eeee; width: 100%; display: flex; padding: 5px; border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

        <div style="cursor: pointer; width: 200px; height: 30px; background-color: #373028; text-align: center; border-radius: 5px; display: inline-block;">
        <label style="cursor: pointer; font-size: 17px; color: white; font-weight: bold;">Usuários</label>
        </div>
        <div style="cursor: pointer; width: 200px; height: 30px; margin-left: 5px; background-color: #373028; text-align: center; border-radius: 5px; display: inline-block;">
        <label style="cursor: pointer; font-size: 17px; color: white; font-weight: bold;">Niveis de acesso</label>
        </div>

    </div>
    <div class="div_br"> </div>

    <div style="background-color: #f1eeee; border: solid 1px #f1eeee; width: 100%; padding: 15px 15px 15px 15px; border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

        <div class="row">
            <div class="col-md-3">
                <span style="font-weight: bold; color:#999494; font-size: 20px;">Usuário:</span>
                <input type="text" class="form form-control" id="usuario" placeholder="Ex: teste.teste">
            </div>

            <div class="col-md-2">
                <span style="font-weight: bold; color:#999494; font-size: 20px;">Senha:</span>
                <input type="password" class="form form-control" id="usuario">
            </div>

            <div class="col-md-2">
                <span style="font-weight: bold; color:#999494; font-size: 20px;">Nascimento:</span>
                <input type="date" class="form form-control" id="usuario">
            </div>

        </div>

        <div class="div_br"> </div>

        <div class="row">

            <div class="col-md-3">
                <span style="font-weight: bold; color:#999494; font-size: 20px;">Tipo Acesso:</span>
                <select class="form form-control">
                    <option Value="All">Selecione</option>
                    <option Value="F">Full</option>
                    <option Value="I">Intermediary</option>
                    <option Value="C">Basic</option>

                </select>

            </div>

            <div class="col-md-3">
                <span style="font-weight: bold; color:#999494; font-size: 20px;">Redefinir Senha:</span>
                <select class="form form-control">
                    <option Value="All">Selecione</option>
                    <option Value="S">Sim</option>
                    <option Value="N">Não</option>

                </select>

            </div>


        </div>

        <div class="div_br"> </div>

        <div class="row" >
            <div class="col-md-3">
                <button class="btn btn-primary">Adicionar</button>
            </div>
        </div>


    </div>










<?php

    include 'rodape.php';

?>