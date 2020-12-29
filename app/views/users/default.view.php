<h1 class = ' text-header'> <?= $text_header ?></h1>
<a href="/users/create" class="btn btn-info btn-sm float-left"><i class="fas fa-plus"></i> New user</a>
<?php  if(false !== $users){ ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $text_table_username?></th>
                <th scope="col"><?= $text_table_group?></th>
                <th scope="col"><?= $text_table_email?></th>
                <th scope="col"><?= $text_table_subscription_date?></th>
                <th scope="col"><?= $text_table_last_login?></th>
                <th scope="col"><?= $text_table_control?></th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($users as $user){ ?>
                    <tr>
                        <td><?= $user->UserName?></td>
                        <td><?= $user->GroupName ?></td>
                        <td><?= $user->Email?></td>
                        <td><?= $user->SubsciriptionDate?></td>
                        <td><?= $user->LastLogin?></td>
                        <td>
                            <a href="/users/edit/<?= $user->UserId?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/users/delete/<?= $user->UserId  ?>" class="btn btn-danger btn-sm" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fas fa-trash-alt"></i> <?= @$text_table_control_delete?></a>
                        </td>
                    
                    </tr>
            <?php   }?>
        </tbody>
    </table>
<?php       }else{
            echo  "<div class = 'alert alert-danger'>No Data To Show</div>";
        }
    
    