<?php  include_once('../../includes/all_classes_and_functions.php');  ?>

<?php

// Redirect to index.php and set GET keywords value to $_POST['keywords'].

redirect_to('keywords/' . htmlspecialchars($_POST['keywords']));




?>