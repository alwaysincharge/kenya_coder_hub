<?php

$list = $user->find_some();


   while ($list->fetch()) {
     echo "<pre>";
     echo "name: $user->username" . "<br>";
       echo "password: $user->password" . "<br>";
       echo "pro1: $user->project1";
     echo "</pre>";
   }




  while ($loss = mysqli_fetch_assoc($user->find_all())) {
     echo "<pre>";
     echo "name: " . $loss['id'] . "<br>";
       echo "password: $user->password" . "<br>";
       echo "pro1: $user->project1";
     echo "</pre>";
   }







$class_vars = get_class_vars(get_class($user));

foreach ($class_vars as $name => $value) {
    echo "$name : $value\n" . "<br>";
}





        
        
        /*
        
    $result = $database->connection->prepare("INSERT INTO users (username, password, img_path) VALUES (?, ?, ?)");

    $result->bind_param("sss", $this->username, $this->passowrd, $this->img_path);

    $this->field_value('username', 'kjkjkjlkjl');
        
    $this->field_value('password', 'jihhjih');
        
    $this->field_value('img_path', 'male.png');

    $result->execute();
        
     

    $result->bind_result($this->username, $this->password, $this->project1);
    
    */
?>