<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'Classes/PHPExcel.php';
    $archivo = "Ventas Videojuegos.xlsx";
    $inputFileType = PHPExcel_IOFactory::identify($archivo);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($archivo);
    $sheet = $objPHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow(); 
    $highestColumn = $sheet->getHighestColumn();
    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
    ?>
    <table id="table" border="1">
        <tbody>
            <?php
            foreach ($sheet->getRowIterator() as $key => $row) {
                ?>
                <tr>
                <?php
                foreach ($row->getCellIterator() as $k => $cell) {
                    ?>
                    <td><?=$cell->getValue()?></td>
                    <?php
                }
                ?>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>