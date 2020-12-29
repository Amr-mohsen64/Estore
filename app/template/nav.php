<div class="d-flex flex-row-reverse">
        <div class="sidebar active  text-center" id="side-bar">
            <div class="container">
                <div class="menue-profile">
                    <img src="/images/avatar2.png" class = 'img-fluid img-thumbnail rounded-circle d-block mx-auto' id='avatar' alt="">
                    <h5 class="admin"><?= @$text_app_manager?></h5>
                    <span class="d-block"><?= @$text_app_manager?></span>
                </div>
                <ul class="links list-unstyled">
                    <li  class = <?= $this->matchURL('/') === true ? ' selected' : '' ?>> <a href="/"><?= @$text_genral_statistics?> <i class="fas fa-chart-bar"></i></a></li>

                    <!-- transactions -->
                    <li><a  data-toggle="collapse" href="#transactions" role="button" aria-expanded="false" aria-controls="transactions"> <?= @$text_transactions?> <i class="fas fa-credit-card"></i></a></li>
                    <li class="collapse multi-collapse" id="transactions">
                        <a href="/store" class ='sub-text'><?= @$text_transactions_sales?> <i class="fas fa-funnel-dollar"></i></a>
                        <a href="/store" class ='sub-text'><?= @$text_transactions_purchases?> <i class="fas fa-store-alt"></i></a>
                    </li>

                    <!-- expense -->
                    <li><a  data-toggle="collapse" href="#expenses" role="button" aria-expanded="false" aria-controls="expenses"> <?= @$text_expense?> <i class="fas fa-money-check-alt"></i></a></li>
                    <li class="collapse multi-collapse" id="expenses">
                        <a href="/expensecategories" class ='sub-text'><?= @$text_expense_categories?> <i class="fas fa-money-bill-alt"></i></a>
                        <a href="/dailyexpense" class ='sub-text'><?= @$text_expense_daily_expense?> <i class="fas fa-dollar-sign"></i></a>
                    </li>

                    <div>
                            <!-- inventory -->
                        <li ><a  data-toggle="collapse" href="#inventory" role="button" aria-expanded="false" aria-controls="inventory"> <?= @$text_inventory?> <i class="fas fa-home"></i></a></li>
                        <li class="collapse multi-collapse" id="inventory">
                            <a href="/products" class = sub-text <?= $this->matchURL('/products') === true ? 'selected' : '' ?>><?= @$text_store_products?> <i class="fas fa-archive"></i></a>
                            <a href="/productcategories" class ='sub-text'><?= @$text_store_categories?> <i class="fas fa-dollar-sign"></i></a>
                        </li>
                    </div>

                    <!-- users -->
                    <li><a  data-toggle="collapse" href="#users" role="button" aria-expanded="false" aria-controls="users"> <?= @$text_users?> <i class="fas fa-users"></i></a></li>
                    <li class="collapse multi-collapse" id="users">
                        <a href="/users" class ='sub-text'><?= @$text_users_list?> <i class="fas fa-user"></i></a>
                        <a href="/usergroups" class ='sub-text'><?= @$text_users_groups?> <i class="fas fa-user-friends"></i></a>
                        <a href="/privileges" class ='sub-text'><?= @$text_users_privileges?> <i class="fas fa-key"></i></a>
                    </li>


                    <li> <a href="/users"><?= @$text_users?> <i class="fas fa-users"></i></a></li>
                    <li> <a href="/clinets"><?= @$text_clients?> <i class="fas fa-users"></i></a></li>
                    <li> <a href="/suppliers"><?= @$text_suppliers?> <i class="fas fa-users"></i></a></li>
                    <li> <a href="/expenses"><?= @$text_expense?> <i class="fas fa-users"></i></a></li>
                    <li> <a href="/transactions"><?= @$text_transactions?> <i class="fas fa-users"></i></a></li>
                    <li> <a href="/users"><?= @$text_users?> <i class="fas fa-users"></i></a></li>
                    <li> <a href="/reports"><?= @$text_reports?> <i class="fas fa-users"></i></a></li>
                    <li> <a href="/auth/logout"><?= @$text_log_out?> <i class="fas fa-users"></i></a></li>
                </ul>
            </div>
        </div>  
        
        <div class="action-view content text-right">
            <?php
                $messages = $this->messenger->getMessages();
                if(!empty($messages)):
                    foreach($messages as $message): ?>
                        <p class="message t<?= $message[1]?>"><?= $message[0]?></p>
            <?php    endforeach;
                endif;
            ?>
            