<!-- sidebar  -->
<div class="sidebar">
    <div class="menue-profile">
        <img src="/images/avatar2.png" class = 'img-fluid img-thumbnail rounded-circle d-block mx-auto' id='avatar' alt="">
        <h5 class="app-user-name text-center "><?= $this->session->u->Profile->FirstName . ' ' . $this->session->u->Profile->LastName ?></h5>
        <span class="text-center d-block"><?= $this->session->u->GroupName?></span>
    </div>
    <ul>
        <!-- transication -->
        <li>
            <a  data-toggle="collapse" href="#transactions" role="button" aria-expanded="false" aria-controls="transactions"> </span><span class="icon"><i class="fas fa-credit-card"></i></span><span class="title"><?= @$text_transactions?> </a>
        </li>
        <!-- transication sub-->
        <li class="collapse multi-collapse" id="transactions">
            <a href="/store" class ='sub-text'>
                <span class="icon"><i class="fas fa-funnel-dollar"></i></span>
                <span class="title"><?= @$text_transactions_sales?> </span>
            </a>
            <a href="/store" class ='sub-text'>
                <span class="icon"><i class="fas fa-store-alt"></i></span>
                <span class="title"><?= @$text_transactions_purchases?></span>
            </a>
        </li>
        
        <!-- expense  main-->
        <li>
            <a  data-toggle="collapse" href="#expenses" role="button" aria-expanded="false" aria-controls="expenses"> 
                <span class="icon"><i class="fas fa-money-check-alt"></i></span>
                <span class="title"><?= @$text_expense?></span> 
            </a>
        </li>
        <!-- expense  sub -->
        <li class="collapse multi-collapse" id="expenses">
            <a href="/expensecategories" class ='sub-text'>
                <span class="icon"><i class="fas fa-money-bill-alt"></i></span>
                <span class="title"><?= @$text_expense_categories?></span> 
            </a>
            <a href="/dailyexpense" class ='sub-text'>
                <span class="icon"><i class="fas fa-dollar-sign"></i></span>
                <span class="title"><?= @$text_expense_daily_expense?> </span>
            </a>
        </li>

        <!-- inventory  main-->
        <li>
            <a  data-toggle="collapse" href="#inventory" role="button" aria-expanded="false" aria-controls="inventory"> 
                <span class="icon"><i class="fas fa-home"></i></span>
                <span class="title"><?= @$text_inventory?></span> 
            </a>
        </li>
        <!-- inventory  sub -->
        <li class="collapse multi-collapse" id="inventory">
            <a href="/productlist" class ='sub-text'>
                <span class="icon"><i class="fas fa-archive"></i></span>
                <span class="title"><?= @$text_store_products?></span> 
            </a>
            <a href="/productcategories" class ='sub-text'>
                <span class="icon"><i class="fas fa-dollar-sign"></i></span>
                <span class="title"><?= @$text_store_categories?> </span>
            </a>
        </li>

        <!-- supplies  -->
        <li> 
            <a href="/suppliers">
                <span class="icon"><i class="fas fa-users"></i></span>
                <span class="title"><?= @$text_suppliers?></span> 
            </a>
        </li>

        <!-- Cleints  -->
        <li> 
            <a href="/clients">
                <span class="icon"><i class="fas fa-users"></i></span>
                <span class="title"><?= @$text_clients?></span> 
            </a>
        </li>

        <!-- users  main-->
        <li>
            <a  data-toggle="collapse" href="#users" role="button" aria-expanded="false" aria-controls="users"> 
                <span class="icon"><i class="fa fa-users"></i></span>
                <span class="title"><?= @$text_users?></span> 
            </a>
        </li>
        <!-- users  sub -->
        <li class="collapse multi-collapse" id="users">
            <a href="/users" class ='sub-text'>
                <span class="icon"><i class="fas fa-users"></i></span>
                <span class="title"><?= @$text_users_list?></span> 
            </a>
            <a href="/usergroups" class ='sub-text'>
                <span class="icon"><i class="fas fa-user-friends"></i></span>
                <span class="title"><?= @$text_users_groups?> </span>
            </a>
            <a href="/privileges" class ='sub-text'>
                <span class="icon"><i class="fas fa-key"></i></span>
                <span class="title"><?= @$text_users_privileges?> </span>
            </a>
        </li>
        
        <!-- logout  -->
        <li> 
            <a href="/auth/logout">
                <span class="title"><?= @$text_log_out?></span> 
                <span class="icon"><i class="fas fa-users"></i></span>
            </a>
        </li>
    </ul>
</div>
<div class="main-container action-view">         
    <?php
        $messages = $this->messenger->getMessages();
        if(!empty($messages)):
            foreach($messages as $message): ?>
                <p class="message t<?= $message[1]?>"><?= $message[0]?></p>
    <?php    endforeach;
        endif; ?>
    