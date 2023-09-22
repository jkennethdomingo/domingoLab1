<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Simple Crud</title>
</head>
<body>
<?php 
$removeError = session()->getFlashdata('remove_error');
?>
    <div class="container mt-5">
        <h1 class="block font-semibold"> 
            <?= isset($action) ? $action : 'Create' ?> an Account
        </h1>
        <form action="<?=base_url('save')?>" method="post" id="form">
            <input type="hidden" name="id" value="<?= isset($val['id']) ? $val['id'] : '' ?>">
            <div class="mb-3">
                <label for="StudName" class="form-label">Name</label>
                <input type="text" class="form-control" id="StudName" name="StudName" placeholder="Enter your name" value="<?= isset($val['StudName']) ? $val['StudName'] : '' ?>">
            </div>
            <div class="mb-3">
                <label for="StudGender" class="form-label">Gender</label>
                <select class="form-select" id="StudGender" name="StudGender">
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Male" <?= (isset($val['StudGender']) && $val['StudGender'] == 'Male') ? 'selected' : '' ?>>Male</option>
                    <option value="Female" <?= (isset($val['StudGender']) && $val['StudGender'] == 'Female') ? 'selected' : '' ?>>Female</option>
                    <option value="Other" <?= (isset($val['StudGender']) && $val['StudGender'] == 'Other') ? 'selected' : '' ?>>Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="StudCourse" class="form-label">Course</label>
                <select class="form-select" id="StudCourse" name="StudCourse">
                    <option value="" disabled selected>Select Course</option>
                    <option value="BSIT" <?= (isset($val['StudCourse']) && $val['StudCourse'] == 'BSIT') ? 'selected' : '' ?>>BSIT</option>
                    <option value="BSCS" <?= (isset($val['StudCourse']) && $val['StudCourse'] == 'BSCS') ? 'selected' : '' ?>>BSCS</option>
                    <option value="BSCpE" <?= (isset($val['StudCourse']) && $val['StudCourse'] == 'BSCpE') ? 'selected' : '' ?>>BSCpE</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="StudSection" class="form-label">Section</label>
                <select class="form-select" id="StudSection" name="StudSection">
                    <option value="" disabled selected>Select Section</option>
                    <?php foreach ($sections as $section): ?>
                        <option value="<?= $section['Section'] ?>" <?= (isset($val['StudSection']) && $val['StudSection'] == $section['Section']) ? 'selected' : '' ?>>
                            <?= $section['Section'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="StudYear" class="form-label">Year</label>
                <input type="number" class="form-control" id="StudYear" name="StudYear" min="1" max="4" placeholder="Select your Year" value="<?= isset($val['StudYear']) ? $val['StudYear'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary"><?= isset($action) ? $action : 'Insert' ?></button>
        </form>
    </div>

    <div class="container mt-5">
        <h1>Student Table</h1>
        <table class="table table-bordered">
            <thead class="head">
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Course</th>
                    <th>Section</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr class="head">
                        <td><?= $student['StudName']; ?></td>
                        <td><?= $student['StudGender']; ?></td>
                        <td><?= $student['StudCourse']; ?></td>
                        <td><?= $student['StudSection']; ?></td>
                        <td><?= $student['StudYear']; ?></td>
                        <td class="icon-cell">
                            <a href="/edit/<?= $student['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a> 
                            <a href="/delete/<?= $student['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="container mt-5">
        <h1>Insert Section</h1>
        <form action="<?=base_url('add')?>" method="post" id="form">
        <input type="hidden" name="id" value="<?= isset($val['Section']) ? $val['Section'] : '' ?>">
            <div class="mb-3">
                <label for="Section" class="form-label">Section</label>
                <input type="text" class="form-control" id="Section" name="Section" placeholder="Enter Section" required value="<?= isset($val['Section']) ? $val['Section'] : '' ?>">
            </div>
            <button type="submit" class="btn btn-primary"><?= isset($action) ? $action : 'Insert' ?></button>
        </form>
    </div>

    <div class="container mt-5">
        <h1>Section List</h1>
        <table class="table table-bordered">
            <thead class="head">
                <tr>
                    <th>Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="head">
                <?php foreach ($sections as $section): ?>
                    <tr>
                        <td><?= $section['Section']; ?></td>
                        <td class="icon-cell">
                            <a href="/editSection/<?= $section['Section']; ?>"><i class="fa-solid fa-pen-to-square"></i></a> 
                            <a href="/remove/<?= $section['Section']; ?>"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if ($removeError): ?>
        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                        <button type="button" class="close" id="closeErrorModal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Cannot delete section with students.
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="close" id="closeSuccessModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            </div>
        </div>
    </div>
    <script src="/assets/js/success.js">
    <?php endif; ?>

    <script src="/assets/js/main.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
