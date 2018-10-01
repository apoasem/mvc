 <div class="addEmployee">

        <fieldset>

            <legend> Edit Employee </legend>

            <form method="post" autocomplete="off">
                <label for = 'name'>Name: </label>
                <input type="text" id="name" name="name" required value="<?= $employee->name?>">

                <label for = 'age'>Age: </label>
                <input type="number" id="age" name="age" min="22" max="60" required value="<?= $employee->age?>">

                <label for = 'address'>Address: </label>
                <input type="text" id="address" name="address" maxlength="100" required value="<?= $employee->address?>">

                <label for = 'salary'>Salary: </label>
                <input type="number" id="salary" name="salary" min="1500" max="9999" step="0.01" required value="<?= $employee->salary?>">

                <label for = 'tax'>Tax: </label>
                <input type="number" id="tax" name="tax" step="0.01" min="1" max="5" required value="<?= $employee->tax?>">

                <input type="submit" name="submit">
            </form>

        </fieldset>
</div>