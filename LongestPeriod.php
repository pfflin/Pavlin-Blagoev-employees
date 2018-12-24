<?php
spl_autoload_register();
$file = file('./test.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$allProjects = new Projects();
foreach ($file as $line){
    $currentRow = explode(",", $line);
    $employee = new Employee($currentRow[0],$currentRow[1],$currentRow[2],$currentRow[3]);
    $allProjects->addToProject($employee);
}
$result = $allProjects->__toString();
echo $result;
?>
<script>
    console.log(<?= json_encode($result); ?>);
</script>



