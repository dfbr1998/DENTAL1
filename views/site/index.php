<?php

/* @var $this yii\web\View */

$this->title = 'Dental';
header("Content-Type: text/html;charset=utf-8");
?>

<div class="site-index">
 
    <div class="jumbotron">
    <figure class="image container is-128x128">
    <img src="/DENTAL1/images/logoDental2.png">
</figure>

        <h1>Dental</h1>

        <p class="Arial">Sistema de manejo de Citas y Pacientes.</p>

        <p><a class="button is-dark is-large" href="index.php?r=pacientes%2Findex">Agregar Paciente</a></p>
    </div>

    <div class="body-content">

        <div class="columns">
            <div class="column">
                <h2>Desea agendar una cita?</h2>

                <p>Mediente nuestra web puedes agendar tu cita verificando la disponibilidad de nuestros doctores.</p>

                <p><a class="btn btn-default" href="#">Agenda una cita</a></p>
            </div>

                        <div class="column">
                <h2>Preguntas</h2>

                <p>Si tienes alguna duda puedes realizarla en el formulario de preguntas y sugerencias!.</p>

                <p><a class="btn btn-default" href="#">Preguntas y Sugerencias &raquo;</a></p>
            </div>

            <div class="column">
                <h2>Manejo Pacientes y Citas</h2>

                <p>Acceso para ususarios del sistema como doctores y administradores.</p>

                <p><a class="btn btn-default" href="/web/index.php?r=site%2Flogin">Ingresar al sistema &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
