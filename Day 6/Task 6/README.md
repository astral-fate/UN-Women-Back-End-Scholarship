## Task 6
Create a table using MySQL, given these details:


| Name of the column        | Type of column|
| :-------------: | :-------------: |
| id |primary key |
| studentName | Sring |
| StudentMobile | Int |
| dob | date |
| stage | Drop down list |
| Expenses | Float |
| Created at | date |



![image](https://github.com/astral-fate/UN-Women-Back-End-Scholarship/assets/63984422/47c8e4ae-2c45-49ab-a080-b176461983d4)


The exported schema from MySQL admin:
````
  CREATE TABLE `university` ( <br>
    `id` int(11) NOT NULL,  <br>
    `StudentName` varchar(100) NOT NULL,  <br>
    `StudentNumber` int(100) NOT NULL,  <br>
    `DoB` date NOT NULL,  <br>
    `Stage` int(2) NOT NULL,  <br>
    `expenses` int(100) NOT NULL,  <br>
    `created_at` date NOT NULL  <br>
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;  <br>
  COMMIT; <br>
````

## Data Insertion

Search how to insert data into the databse.
Learn how to calcluate the date of which every entry has been created


![image](https://github.com/astral-fate/UN-Women-Back-End-Scholarship/assets/63984422/1aebfbc0-784f-40e0-86c2-427ac153b31f)

````

INSERT INTO `university`(`id`, `StudentName`, `StudentNumber`, `DoB`, `Stage`, `expenses`, `created_at`)
VALUES ('1','Fatimah','09999','2001-06-30','12','120','2024-05-09')


````

