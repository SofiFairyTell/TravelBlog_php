<?php
session_start();
session_unset();
echo "<script type='text/javascript'>window.location.href = '../authorize.php';</script>";
exit();