<?php 

    // echo "<h1>Employee</h1>"; 
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg']; 
        unset($_SESSION['msg']);
    }

    

?>

<!DOCTYPE html>
<html>
    <head>
    <style>
    table, th, td {
    border: 1px solid black;
    }
    </style>
    </head>
<body>

<h1 class = ' text-header'> <?= $text_header ?></h1>
<a href="employee/add" class = 'btn btn-secondary mb-2'><?= @$text_add_employee ?></a>

<table class = 'table'>
    <tr>
        <th><?= @$text_table_employee_name ?></th>
        <th><?= @$text_table_employee_age ?></th>
        <th><?= @$text_table_employee_address ?></th>
        <th><?= @$text_table_employee_tax ?></th>
        <th><?= @$text_table_employee_control ?></th>
    </tr>

    <?php 
        if(false !== $employee){
            foreach($employee as $emp){ ?>
                <tr>
                    <td><?= $emp ->name ?></td>
                    <td><?=  $emp ->age?></td>
                    <td><?=  $emp ->address?></td>
                    <td><?= $emp ->tax?></td>
                    <td>
                        <a href="employee/edit/<?= $emp->id ?>"  class = 'btn btn-primary btn-sm ' >تعديل</a>
                        <a href="employee/delete/<?= $emp->id ?>"  class = 'btn btn-primary  btn-sm' >حذف</a>
                    </td>
                </tr>
    <?php
            }
        }else{
            echo 'no emp';
        }
    
    
    ?>
</table>

</body>
</html>
