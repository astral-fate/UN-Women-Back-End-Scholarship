## Table of Contents
- [Constrains](#$Constrains)
- [SQL Statements](#SQL-Statements)
- [SQL Conncetion](#SQL-Conncetion)
- [Task 7](#Task-7)


## Constrains

### Not Null

### Primary Key

### Default


## SQL Statements

### Select 

### like 

If we want to search for a row that starts with the letter a for example, we can write this using like as follow:

````
SELECT *
FROM `university`
where `StudentName` like `%a`

````

This will allow us to print all the values that starts with 'a'

Now if we want to display all rows that 'contains' the letter 'a', either in the middle, beggining or the end, we can use the following syntax:

````
SELECT *
FROM `university`
where `StudentName` like `%a%`

````


### Insert value into table

We can either enter a value within a table, either through SQL query, or through the insert button.


### Order By

## SQL Conncetion

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

