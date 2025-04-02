<?php
// session_start();
 include_once "inc/header.php";
include_once __DIR__ . "../core/functions.php";
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
$users = get_data_from_json(); 
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