<?php
include_once "Patient.php";
include_once "QueuePatient.php";
include_once "PatientService.php";
$ps = new PatientService();
$queue = new QueuePatient();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST["add"])) {
        $name = $_REQUEST["name"];
        $code = $_REQUEST["code"];
        if (empty($name) || empty($code)) {
            echo "<script> alert(' Nhap du lieu con thieu') </script>";
        } else {
            $patient = $ps->getPatient($_REQUEST["name"]);
            $patient->code = $code;
            $queue->enqueue($patient);
        }
    } elseif (isset($_REQUEST["get-patient"])) {
        $currentPatient = ($queue->dequeue());
    }
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
    <select name="name" id="">
        <?php foreach ($ps->getAll() as $key => $patient):?>
            <option value="<?php echo $patient->id ?>"> <?php echo $patient->name ?> </option>
        <?php endforeach; ?>

    </select>
    <input type="text" name="code" placeholder="Dien ma benh nhan">
    <input type="submit" value="Add" name="add">
    <input type="submit" value="Get Patient" name="get-patient">
</form>
<div> Clinic
    <p>Nguoi dang kham la : <?php echo $currentPatient->name ?? "Chua co ai kham " ?></p>
</div>
<table border="1">
    <thead>
    <tr>
        <th>Index</th>
        <th>Name</th>
        <th>Code</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($queue->getQueue() as $key => $patient): ?>
        <tr>
            <td> <?php echo $key + 1 ?></td>
            <td><a href="detail-patient.php?id=<?php echo $patient->id?>"><?php echo $patient->name ?></a></td>
            <td> <?php echo $patient->code ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
<?php
