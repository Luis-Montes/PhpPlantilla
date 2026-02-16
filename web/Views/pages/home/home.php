<?php
if (!isset($_SESSION["user"])) {
    header("Location: login");
    exit();
}
?>
<?php if (isset($_SESSION["user"])): ?>
    <h1>Bienvenido, <?= $_SESSION["user"]["name"] ?>!</h1>
<?php endif; ?>