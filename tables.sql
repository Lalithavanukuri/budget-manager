 create table register(name varchar(20),mobile varchar(20),gen varchar(20),age int ,username varchar(20), email varchar(30), password varchar(10));
Query OK, 0 rows affected (0.04 sec)

CREATE TABLE expenses (username VARCHAR(20) NOT NULL,    expense_name VARCHAR(100) NOT NULL,    expense_category VARCHAR(20) NOT NULL,    expense_amount INT NOT NULL);
Query OK, 0 rows affected (0.01 sec)

mysql> CREATE TABLE goals (username VARCHAR(20) NOT NULL,    goalname VARCHAR(100) NOT NULL, goalAmount INT NOT NULL);
Query OK, 0 rows affected (0.02 sec)

mysql> create table income(username varchar(20) NOT NULL,amount int NOT NULL);
Query OK, 0 rows affected (0.02 sec)

create table budgetlimit (username varchar(20),Budget_Limit_name varchar(20),budget_Limit int);