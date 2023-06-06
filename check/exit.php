<?php
if (isset($_COOKIE["session"])) {
    setcookie('session', null, -1, '/'); 
}

if (isset($_COOKIE["result"])) {
    setcookie('result', null, -1, '/'); 
}
header('Location: ../index.php');
?>