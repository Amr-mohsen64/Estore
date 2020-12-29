<h1 class = ' text-header'> <?= $text_header ?></h1>
<a href="/productcategories/create" class="btn btn-info btn-sm float-left"><i class="fas fa-plus"></i> <?= $text_new_item?></a>
<?php  if(false !== $categories){ ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $text_table_category_name?></th>
                <th scope="col"><?= $text_table_category_image?></th>    
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($categories as $category){ ?>
                    <tr>
                        <td><?= $category->Name?></td>
                        <td><?= $category->Image ?></td>
                        <td>
                            <a href="/productcategories/edit/<?= $category->CategoryId?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/productcategories/delete/<?= $category->CategoryId ?>" class="btn btn-danger btn-sm" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fas fa-trash-alt"></i> <?= @$text_table_control_delete?></a>
                        </td>
                    
                    </tr>
            <?php   }?>
        </tbody>
    </table>
<?php       }else{
            echo  "<div class = 'text-danger'>No Data To Show</div>";
        }
    
    