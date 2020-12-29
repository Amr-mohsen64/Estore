
<div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
        <h4 class="text-primary d-block p-3">Login to System</h4>
        <img src="/images/login-icon.png" id="login-icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method='post' id='login'>
        <input type="text" id="login" class="fadeIn second" name="ucname" placeholder="User Name" value = '<?= $this->showValue('ucname') ?>'>
        <input type="password" id="password" class="fadeIn third" name="ucpwd" placeholder="password">
        <input type="submit" name='login' class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <!-- <div id="formFooter">
    <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->
    <?php
        $messages = $this->messenger->getMessages();
        if(!empty($messages)):
            foreach($messages as $message): ?>
                <p class="message t<?= $message[1]?>"><?= $message[0]?></p>
    <?php    endforeach;
        endif; ?>
</div>