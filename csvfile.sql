CREATE TABLE IF NOT EXISTS employee_details(
  Employee_details_id int(11) NOT NULL,
  employee_id int(11) NOT NULL,
  employee_name varchar(250) NOT NULL,
  product_password BINARY(64) NOT NULL,
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;


INSERT INTO 'employee_details' ('employee_details_id', 'employee_id', 'employee_name','product_password') VALUES(@employee_details_id,@employee_id,@employee_name,HASHBYTES('SHA2_512', @employee_password))

ALTER TABLE 'employee_details'
  ADD PRIMARY KEY ('employee_details_id');


ALTER TABLE 'employee_details'
  MODIFY 'employee_details_id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;


CSV file:

employeedetails.csv


1, 101, 'Kumar','123'
2, 102, 'Shekar','123'
3, 103, 'Ravi','123'
4, 104, 'Manoj','123'
5, 105, 'Geetha','123'
6, 106, 'Surya','123'
7, 107, 'Prabhu','123'
8, 108, 'Shivani','123'
9, 109, 'Ramya','123'
10, 110, 'Harish','123'
