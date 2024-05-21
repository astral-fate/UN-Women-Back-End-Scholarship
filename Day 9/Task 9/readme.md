
We have 1st created a new table called 'Testominal'.   We have added 4 coloumns as follow:
![image](https://github.com/astral-fate/UN-Women-Back-End-Scholarship/assets/63984422/18fc8209-5d6d-4e15-8cb9-76518f489a5f)

Then we have connected our database to the PHP server, using conn. Then we have started to call our varibales that have the same name in the HTML form

```
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include_once('includes/conn.php');
	include('upload.php');
    $name = $_POST['name'];
    $position = $_POST['position'];  
    $content = $_POST['content'];  

    
    try {
		
        $sql = "INSERT INTO testimonial(name, position, content, image) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $position, $content, 'images/' . $image_name]);
        echo "Record inserted successfully";
    } catch(PDOException $e) {
        $msg = $e->getMessage();
        echo "Error: " . $msg;
    }
}
?>
```

We have also added ```METHOD = "POST"``` to ensure that the user interface is inserting into the data. 


## The outcomes

Upon completion, we have tested the testomial page by inserting data into it


![image](https://github.com/astral-fate/UN-Women-Back-End-Scholarship/assets/63984422/3b0c62ac-07da-40d0-aadd-4d95531f1e57)

Then here we see from the PHP admin that the data are correctly inserted. 

![image](https://github.com/astral-fate/UN-Women-Back-End-Scholarship/assets/63984422/76c49ddc-a4e9-420e-9c2e-4d9a1c8e698c)
