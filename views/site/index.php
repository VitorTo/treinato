<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'Treinato';
?>


<?php 

if(!empty(Yii::$app->user->identity->id)){
    // usuario logado
    echo $this->render('parts/user', [
        'dadosAtuais' => $dadosAtuais
    ]); 

} else {
    // sem logar
    echo $this->render('parts/newuser'); 
}

?>

