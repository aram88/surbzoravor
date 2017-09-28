@ECHO OFF
SET BIN_TARGET=%~dp0/../vendor/apigen/apigen/apigen.php
php "%BIN_TARGET%" %*
