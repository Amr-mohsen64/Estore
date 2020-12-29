<h1 class = ' text-header'> <?= $text_header ?></h1>
<a href="/productlist/create" class="btn btn-info btn-sm float-left"><i class="fas fa-plus"></i> <?= $text_new_item?></a>
<?php  if(false !== $products){ ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $text_table_name?></th>
                <th scope="col"><?= $text_table_category?></th>      
                <th scope="col"><?= $text_table_sell_price?></th>    
                <th scope="col"><?= $text_table_buy_price?></th>    
                <th scope="col"><?= $text_table_quantity?></th>    
                <th scope="col"><?= $text_table_control?></th>    
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($products as $product){ ?>
                    <tr>
                        <td><?= $product->Name?></td>
                        <td><?= $product->categoryName ?></td>
                        <td><?= $product->SellPrice ?></td>
                        <td><?= $product->BuyPrice ?></td>
                        <td><?= $product->Quantity ?></td>
                        <td>
                            <a href="/productlist/edit/<?= $product->ProductId ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="/productlist/delete/<?= $product->ProductId  ?>" class="btn btn-danger btn-sm" onclick="if(!confirm('<?= $text_table_control_delete_confirm ?>')) return false;"><i class="fas fa-trash-alt"></i> <?= @$text_table_control_delete?></a>
                        </td>
                    
                    </tr>
            <?php   }?>
        </tbody>
    </table>
<?php       }else{
            echo  "<div class = 'text-danger'>No Data To Show</div>";
        }
    
    