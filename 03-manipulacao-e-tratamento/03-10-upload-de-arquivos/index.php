<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.10 - Upload de arquivos");

/*
 * [ upload ] sizes | move uploaded | url validation
 * [ upload errors ] http://php.net/manual/pt_BR/features.file-upload.errors.php
 */
fullStackPHPClassSession("upload", __LINE__);

$folder = __DIR__."/uploads";

if (!file_exists($folder) || !is_dir($folder))
{
    mkdir($folder, 0755);
}

echo "<pre>";
var_dump([
    "filesize" => ini_get("upload_max_filesize"),
    "postsize" => ini_get("post_max_size")
]);
echo "</pre>";

echo "<pre>";
var_dump([
    filetype(__DIR__."/index.php"),
    mime_content_type(__DIR__."/index.php")
]);
echo "</pre>";

$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);

if ($_FILES && !empty(($_FILES['file']['name']))) {
    $filesUpload = $_FILES['file'];

    echo "<pre>";
    var_dump($filesUpload);
    echo "</pre>";

    $allowebTypes = [
        "image/jpg",
        "image/jpeg",
        "image/png",
        "application/pdf"
    ];

    $newFileName = time() . mb_strstr($filesUpload['name'], ".");

    if (in_array($filesUpload['type'], $allowebTypes))
    {
        if (move_uploaded_file($filesUpload['tmp_name'], __DIR__."/uploads/{$newFileName}"))
        {
            echo "<p class='trigger accept'>Arquivo enviado com sucesso!</p>";
        }else{
            echo "<p class='trigger error'>Erro inesperádo!</p>";
        }
    }else{
        echo "<p class='trigger error'>Tipo de arquivo não permitido!</p>";
    }

}elseif ($getPost) {
    echo "<p class='trigger warning'>Wooops, parece que o arquivo é muito grande</p>";
}else{
    if ($_FILES)
    {
        echo "<p class='trigger warning'>Selecione um arquivo antes de enviar</p>";
    }
}


include __DIR__."/form.php";
echo "<pre>";
var_dump(__DIR__."/uploads");
echo "</pre>";