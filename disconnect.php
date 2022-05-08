<?php

//close session
session_start();
session_destroy();

//return to index.php
header("Location: index.php");
exit();