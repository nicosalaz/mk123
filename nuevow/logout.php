<?php
    @session_start();
    session_destroy();
    echo "<script languaje='javascript'>location.href='./';</script>";
?>
