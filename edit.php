<?php include "inc/header.php"; ?>
<?php  
if(!isset($_GET['id'])){
    set_messages('danger',"not found data for this id");
    header("location: show_data.php");
    // print_r(header("location :show_data.php"));
    exit;
}

$id =$_GET['id'];
$data_emp=get_data_from_json();
$emp_data=null;
foreach($data_emp as $emp){
if($emp['id']==$id){
    $emp_data=$emp;
    break;
}
}
// var_dump($emp_data);
// exit;

    ?>

<h2>Edit Employee</h2>
<form action="handelers/update_emps.php" method="POST">
<div class="mb-3">

        <input type="hidden" id="id" name="id" value="<?= $emp_data['id'] ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" id="name" name="name" value="<?= $emp_data['name'] ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="text" id="email" name="email" value="<?= $emp_data['email'] ?>"  class="form-control">
    </div>

    <div class="mb-3">
        <label for="salary" class="form-label">Salary:</label>
        <input type="number" id="salary" name="salary" value="<?= $emp_data['salary'] ?>"  class="form-control">
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?= $emp_data['phone'] ?>"  class="form-control">
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Employee Type:</label>
        <select name="type" id="type" class="form-select">
            <option value="full_time" <?= $emp_data['type'] == "full_time"? 'selected' :'' ?> >Full Time</option>
            <option value="part_time" <?= $emp_data['type'] == 'part_time'? 'selected' :'' ?> >Part Time</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit Edit</button>
</form>


<?php include "inc/footer.php"; ?>