<form action="" class = 'appForm' method = 'post' enctype = "application/x-www-form-urlencoded">
    <p class="message"><? isset($message)?></p>
    <div class="form-contorl">
        <label for="name">Employee name</label>
        <input type="text" name = 'name' id='name' placholder='write your name' value= '<?= $employee->name;?>'>
    </div>
    <div class="form-contorl">
        <label for="age">Employee Age</label>
        <input type="number" name = 'age' id='age' placholder='write your age' min='22' max='60' value= '<?= $employee->age;?>'>
    </div>
    <div class="form-contorl">
        <label for="address">Employee Address</label>
        <input type="text" name = 'address' id='address' placholder='write your address' value= '<?= $employee->address;?>'>
    </div>
    <div class="form-contorl">
        <label for="salary">Employee Salary</label>
        <input type="number" name = 'salary' id='salary' step = "0.01" min='1500' max='9000' value= '<?= $employee->salary; ?>'>
    </div>
    <div class="form-contorl">
        <label for="tax">Employee Tax(%)</label>
        <input type="number" name = 'tax' id='tax' step = "0.01" min='1' max='5' value= '<?= $employee->tax; ?>'>
    </div>
    <div class="form-contorl">
        <input type="submit" name = 'submit' value='save'>
    </div>
</form>