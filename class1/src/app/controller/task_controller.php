<?php

    $query = $conn->prepare('INSERT INTO TASK
    (task_name, task_desc, final_date, priority, id_folder)
    VALUES
    (:task_name, :task_desc, :final_date, :priority, :folder_id)');

    $query->bindParam(':task_name', $task_name);
    $query->bindParam(':task_desc', $task_desc);
    $query->bindParam(':final_date', $final_date);
    $query->bindParam(':priority', $priority);
    $query->bindParam(':folder_id', $id_folder);

    $query->execute();

// default methodology to execute queries in safe form. But, slowly 
// it can be do it faster. How? Continue reading:

    $data = [
        ':task_name' => $task_name,
        ':task_desc' => $task_desc,
        ':final_date' => $final_date,
        ':priority' => $priority,
        ':folder_id'=> $id_folder,
    ];

    foreach($data as $param => $value){
        $query->bindParam($param, $value);
    }

    $query->execute();

// here, I did a array to has all the parameters and their values. after that, 
// in the forEach, PHP do all the job to use their respective values in each parameter.
// and finally, execute the query.