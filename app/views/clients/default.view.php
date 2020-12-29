<h1 class = ' text-header'> <?= $text_header ?></h1>
<a href="/clients/create" class="btn btn-info btn-sm float-left"><i class="fas fa-plus"></i> <?= $text_new_item?></a>
<?php  if(false !== $clients){ ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $text_table_name?></th>
                <th scope="col"><?= $text_table_email?></th>
                <th scope="col"><?= $text_table_phone_number?></th>
                <th scope="col"><?= $text_table_control?></th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($clients as $client){ ?>
                    <tr>
                        <td><?= $client->Name?></td>
                        <td><?= $client->Email ?></td>
                        <td><?= $client->PhoneNumber?></td>
                        <td>
                            <a href="/clients/edit/<?= $client->ClientId?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/clients/delete/<?= $client->ClientId  ?>" class="btn btn-danger btn-sm" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fas fa-trash-alt"></i> <?= @$text_table_control_delete?></a>
                        </td>
                    
                    </tr>
            <?php   }?>
        </tbody>
    </table>
<?php       }else{
            echo  "<div class = 'text-danger'>No Data To Show</div>";
        }
    
    