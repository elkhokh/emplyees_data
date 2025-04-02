<?php
// session_start();
 include_once "inc/header.php";
include_once __DIR__ . "../core/functions.php";
// include __DIR__ . "../handelers/create_emps.php";
// include "./core/validations.php";
// include "./core/functions.php";
?>
<h2 class="mt-5">Employee List</h2>
<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        <?php
    // print_r(get_data_from_json());

$users = get_data_from_json('emp.json'); 
            foreach ($users as $user) {
                if (!empty($user)) {
                    echo "<tr>
                        <td>{$user['name']}</td>
                        <td>{$user['email']}</td>
                        <td>{$user['salary']}</td>
                        <td>{$user['phone']}</td>
                        <td>{$user['type']}</td>
                    </tr>";
                }}
        ?>
    </tbody>
</table>
</div>


<?php include "inc/footer.php";?>