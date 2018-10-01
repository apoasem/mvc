<div class="showEmployee">
    <a href="/employee/add"> <?= $text_add_employee ?></a>
    <table>
        <thead>
        <th><?= $text_employee_name ?></th>
        <th><?= $text_employee_age ?></th>
        <th><?= $text_employee_address ?></th>
        <th><?= $text_employee_salary ?></th>
        <th><?= $text_employee_tax ?></th>
        <th><?= $text_employee_control ?></th>
        </thead>

        <tbody>

        <?php
        if($employees !== false)
        {
            //var_dump($result);
            foreach ($employees as $employee)
            {
                ?>

                <tr>
                    <td> <?= $employee->name ?> </td>
                    <td> <?= $employee->age ?> </td>
                    <td> <?= $employee->address ?></td>
                    <td> <?= round( $employee->salary )?></td>
                    <td> <?= $employee->tax ?></td>
                    <td>
                        <a href="/employee/edit/<?= $employee->id ?>"> Edit</a>
                        <a href="/employee/delete/<?= $employee->id?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false;"> Delete</a>

                    </td>
                </tr>
            <?php   }
        }else{ ?>
            <tr>
                <td colspan="6">sorry no employees to show</td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
</div>
