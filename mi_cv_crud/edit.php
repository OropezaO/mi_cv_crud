<?php
require_once("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $department = $_POST['department'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = $conn->prepare("UPDATE tbl_emp_details SET department=?, name=?, email=? WHERE id=?");
    $sql->bind_param("sssi", $department, $name, $email, $id);

    if ($sql->execute()) {
        header("Location: index.php?success=edit");
        exit();
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_emp_details WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label>Departamento:</label>
    <input type="text" name="department" value="<?php echo $row['department']; ?>" required>
    <label>Nombre:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
    <button type="submit">Actualizar</button>
</form>
