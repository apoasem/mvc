 <div class="addEmployee">

        <fieldset>

            <legend> ADD Employee </legend>

            <form method="post" autocomplete="off">
                <label for = 'name'>Name: </label>
                <input type="text" id="name" name="name" required>

                <label for = 'age'>Age: </label>
                <input type="number" id="age" name="age" min="22" max="60" required>

                <label for = 'address'>Address: </label>
                <input type="text" id="address" name="address" maxlength="100" required>

                <label for = 'salary'>Salary: </label>
                <input type="number" id="salary" name="salary" min="1500" max="9999" step="0.01" required>
                <label for = 'tax'>Tax: </label>
                <input type="number" id="tax" name="tax" step="0.01" min="1" max="5" required>

                <input type="submit" name="submit">
            </form>

        </fieldset>
    </div>