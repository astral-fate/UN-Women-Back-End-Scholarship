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
  CREATE TABLE `university` ( 
    `id` int(11) NOT NULL,  
    `StudentName` varchar(100) NOT NULL,  
    `StudentNumber` int(100) NOT NULL,  
    `DoB` date NOT NULL,  
    `Stage` int(2) NOT NULL,  
    `expenses` int(100) NOT NULL,  
    `created_at` date NOT NULL  
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;  
  COMMIT; 
````

## Data Insertion

Search how to insert data into the databse.
Learn how to calcluate the date of which every entry has been created


![image](https://github.com/astral-fate/UN-Women-Back-End-Scholarship/assets/63984422/b49df885-47c8-4799-83aa-64cb2542ab6c)

````

INSERT INTO `university`(`id`, `StudentName`, `StudentNumber`, `DoB`, `Stage`, `expenses`, `created_at`)
VALUES ('1','Fatimah','09999','2001-06-30','12','120','2024-05-09')


````

