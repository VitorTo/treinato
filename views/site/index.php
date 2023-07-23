<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Treinato';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4"><?=$this->title?>!</h1>

        <p class="lead">Seu parceiro definitivo para aprimorar seus treinos e acompanhar o seu progresso!</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::to(['site/login']) ?>">Faça o login <i class="fas fa-arrow-right"></i> </a></p>
    </div>

    <div class="body-content">
        <div class="site-about">

            <h5>
                O Treinato é uma plataforma projetada exclusivamente para auxiliá-lo(a) na organização eficiente dos seus treinos, proporcionando uma experiência única e personalizada. Seja qual for o seu objetivo - seja ganhar massa muscular, emagrecer, melhorar a resistência ou simplesmente levar um estilo de vida mais ativo - o Treinato está aqui para impulsionar o seu sucesso.
            </h5>

            <h5>
                Com recursos intuitivos e de fácil utilização, você poderá planejar e monitorar suas sessões de treinamento de maneira prática e efetiva. Além disso, o Treinato armazena um histórico detalhado das suas atividades, permitindo que você acompanhe sua evolução ao longo do tempo. Imagine poder visualizar o quanto progrediu em sua jornada de fitness!
            </h5>

            <h5>
                Desperte o atleta dentro de você e descubra a motivação para superar seus limites. Através do Treinato, estabeleça metas alcançáveis e mantenha-se motivado(a) com cada conquista que alcançar. Nossa plataforma é um verdadeiro parceiro de treinamento, proporcionando uma experiência gratificante em busca de um corpo e mente mais saudáveis.
            </h5>

            <h5>
                Não espere mais para dar um passo em direção a uma versão melhor de si mesmo(a). Junte-se ao Treinato hoje e comece a trilhar o caminho para o seu melhor desempenho físico e mental!
            </h5>

        </div>

    </div>
</div>