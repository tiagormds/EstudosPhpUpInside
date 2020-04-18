<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.08 - Gestão de diretórios");

/*
 * [ verificar, criar e abrir ] file_exists | is_dir | mkdir  | scandir
 */
fullStackPHPClassSession("verificar, criar e abrir", __LINE__);

$folder = __DIR__."/uploads";

if (!file_exists($folder) || !is_dir($folder))
{
    mkdir($folder, 0755);
}else{
    echo "<pre>";
        var_dump(scandir($folder));
    echo "</pre>";
}

/*
 * [ copiar e renomear ] copy | rename
 */
fullStackPHPClassSession("copiar e renomear", __LINE__);


$file = __DIR__."/file.txt";

echo "<pre>";
var_dump(
    pathinfo($file),
    scandir($folder),
    scandir(__DIR__)
);
echo "</pre>";

if (!file_exists($file) || !is_file($file))
{
    fopen($file, w);
}else{
    //    echo "<pre>";
//    var_dump(filemtime($file), filemtime(__DIR__."/uploads/file.txt"));
//    echo "</pre>";


//    copy($file, $folder."/".basename($file));
//    rename(__DIR__."/uploads/file.txt", __DIR__."/uploads/".time().".".pathinfo($file)["extension"]);
//    rename(__DIR__."/uploads/file.txt", __DIR__."/uploads/".time().".".pathinfo($file)["extension"]);
}


/*
 * [ remover e deletar ] unlink | rmdir
 */
fullStackPHPClassSession("remover e deletar", __LINE__);

$dirRemove = __DIR__."/remove";
$dirFiles = array_diff(scandir($dirRemove), ['.', '..']);
$dirCount = count($dirFiles);

echo "<pre>";
var_dump($dirFiles, $dirCount);
echo "</pre>";

if ($dirCount >= 1)
{
    echo "<h2>Clear...</h2>";
    foreach (scandir($dirRemove) as $fileItem)
    {
        $fileItem = __DIR__."/remove/{$fileItem}";
        if (file_exists($fileItem) && is_file($fileItem))
        {
            unlink($fileItem);
        }
    }
}else{
    rmdir($dirRemove);

}