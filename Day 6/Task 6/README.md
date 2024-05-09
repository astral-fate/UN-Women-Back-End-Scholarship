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


'
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

'
