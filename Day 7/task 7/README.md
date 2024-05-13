
## Task 7



 In the 7th task we are asked to retrive the data from our databse and display it in this php tamplete:

````
<div class="container">
  <h2>Students Data</h2>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Mobile</th>
        <th>Date of Birth</th>
        <th>Stage</th>
        <th>Expenses</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>02154</td>
        <td>1/5/2000</td>
        <td>3</td>
        <td>6521</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>05421</td>
        <td>12/4/1990</td>
        <td>4</td>
        <td>9517</td>
      </tr>
      <tr>
        <td>July</td>
        <td>02154</td>
        <td>5/9/2001</td>
        <td>3</td>
        <td>15740</td>
      </tr>
    </tbody>
  </table>
</div>
````

To do that, we can use the for each statment, then looping each element on the db as follow:

````
    <td>
    <?php
     foreach($stmt->fetchAll() as $row){
      echo $row['name'];
      echo "<br>";
      }
     ?>
      
    </td>
    </tr>  

````




````
    <?php
     foreach($stmt->fetchAll() as $row){
      echo "<tr>";
      echo '<td>' .  $row['name']; '</td>';
      echo '<td>' .  $row['phone']; '</td>';
      echo '<td>' .  $row['city']; '</td>';
      echo "<br>";
      }
     ?>

````

## Output

![image](https://github.com/astral-fate/UN-Women-Back-End-Scholarship/assets/63984422/38c4c8da-f4f9-4d36-8368-f6ea8c213e79)

![image](https://github.com/astral-fate/UN-Women-Back-End-Scholarship/assets/63984422/5cb9e084-ffb5-4e0d-a714-6311fc181da7)


