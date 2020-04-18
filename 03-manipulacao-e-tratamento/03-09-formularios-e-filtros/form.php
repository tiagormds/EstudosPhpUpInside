<form name="post" action="http://localhost/03-manipulacao-e-tratamento/03-09-formularios-e-filtros" method="<?= $form->method; ?>" enctype="multipart/form-data" novalidate>
    <p style="margin-bottom: 10px; text-align: right"><a href="http://localhost/03-manipulacao-e-tratamento/03-09-formularios-e-filtros" title="Atualizar">Atualizar</a></p>
    <div class="col2">
        <input type="text" name="name" value="<?= $form->name; ?>" placeholder="Nome:"/>
        <input type="email" name="mail" value="<?= $form->mail; ?>" placeholder="E-mail:"/>
    </div>
    <button>Enviar Agora!</button>
</form>