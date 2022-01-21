<?php
include_once "Patient.php";
include_once "PatientService.php";
$ps = new PatientService();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ps->addPatient($_REQUEST);

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="name" placeholder="Nhap ten benh nhan">
    <input type="text" name="age" placeholder="Nhap tuoi benh nhan">
    <input type="text" name="address" placeholder="Nhap dia chi benh nhan">
    <input type="text" name="phone" placeholder="Nhap so dien thoai benh nhan">
    <button> Add </button>

</form>
<table border="1">
    <thead>
    <tr>
        <th>Index</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ps->patients as $key => $patient):?>
        <tr>
            <td> <?php echo $key + 1 ?> </td>
            <td> <?php echo $patient->name ?> </td>
            <td><a href="detail-patient.php?id=<?php echo $patient->id?>"> Detail</a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>

</body>
</html>
