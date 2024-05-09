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

'
