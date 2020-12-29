<h1 class = ' text-header'> <?= @$text_header ?></h1>
<a href="/privileges/create" class="btn btn-info btn-sm float-left"><i class="fas fa-plus"></i> <?= @$text_new_item?> </a>
<?php  if(false !== $privileges){ ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= @$text_table_privilege?></th>
                <th scope="col"><?= @$text_table_control?></th>
            </tr>
        </thead>    
        <tbody>
        <?php
            foreach($privileges as $privilege){ ?>
                    <tr>
                        <td><?= $privilege->PrivilegeTitle?></td>
                        <td>
                            <a href="privileges/edit/<?= $privilege->PrivilegeId ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> <?= @$text_table_control_edit?></a>
                            <a href="privileges/delete/<?= $privilege->PrivilegeId  ?>" class="btn btn-danger btn-sm" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fas fa-trash-alt"></i> <?= @$text_table_control_delete?></a>
                        </td>
                    </tr>
    <?php } ?>
        </tbody>
    </table>
    <?php }else{
            echo  "<div class = 'alert alert-danger'>No Data To Show</div>";
        }