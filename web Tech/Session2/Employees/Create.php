<?php require_once '../Templates/Header.php'; ?>

<?php
require_once '../Public/Employees.php';
require_once '../Public/Jobs.php';
require_once '../Public/Departments.php';

$emp = new Employees();
$job = new Jobs();
$dept = new Departments();

if (isset($_POST['submit'])) {
    $employee_id   = (int)$_POST['employee_id'];
    $first_name    = trim($_POST['first_name']);
    $last_name     = trim($_POST['last_name']);
    $job_id        = trim($_POST['job_id']); 
    $department_id = (int)$_POST['department_id'];
    $salary        = (float)$_POST['salary'];

    $result = $emp->create($employee_id, $job_id, NULL, $department_id, NULL, NULL, $first_name, $last_name, $salary, NULL);

    if ($result) {
        header('location:../Views/Employee.php');
        exit;
    } else {
        echo '<p class="container bg-danger text-center text-light">Failed to store</p>';
    }
}
?>

<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Employee ID</label>
                    <input type="number" class="form-control" name="employee_id" required placeholder="Enter ID" />
                </div>

                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" required placeholder="Enter First Name" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" required placeholder="Enter Last Name" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Job</label>
                    <select class="form-select" name="job_id" required>
                        <option value="" selected disabled>Select Job</option>
                        <?php
                        $res = $job->read();
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['job_id']}'>{$row['job_id']} - {$row['job_title']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <select class="form-select" name="department_id" required>
                        <option value="" selected disabled>Select Department</option>
                        <?php
                        $res = $dept->read();
                        while ($row = $res->fetch_assoc()) {
                            echo "<option value='{$row['department_id']}'>{$row['department_id']} - {$row['department_name']}</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Salary</label>
                    <input type="number" step="0.01" class="form-control" name="salary" required placeholder="Enter Salary" />
                </div>

                <div class="text-center">
                    <input type="submit" name="submit" value="Add Employee" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../Templates/Footer.php'; ?>
