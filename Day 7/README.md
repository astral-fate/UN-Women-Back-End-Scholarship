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
