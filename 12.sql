CREATE TABLE patients (
    patient_id INT PRIMARY KEY,
    patient_name VARCHAR(50) NOT NULL,
    Age Int,
    DOB DATE,
    gender CHAR(1),
    phone_num VARCHAR(20),
    aadhar_no VARCHAR(20) ,
    password VARCHAR(20) 
);

INSERT INTO patients (patient_id, patient_name,Age, DOB, gender, phone_num, aadhar_no,password) VALUES 
(1, 'Bharath',35, '1988-01-15', 'M', '+91 9876543210', '1234 5678 9012','pass@123'),
(2, 'Amrita',42, '1981-05-20', 'F', '+91 9876543211', '2345 6789 0123','pass@123'),
(3, 'Sai Kumar',27, '1995-08-10', 'M', '+91 9876543212', '3456 7890 1234','pass@123'),
(4, 'Neha',56, '1967-03-25', 'F', '+91 9876543213', '4567 8901 2345','pass@123'),
(5, 'Rahul',18, '2004-12-01', 'M', '+91 9876543214', '5678 9012 3456','pass@123'),
(6, 'Emily',46, '1976-11-08', 'F', '+91 9876543215', '6789 0123 4567','pass@123'),
(7, 'Samantha ',24, '1998-06-03', 'F', '+91 9876543216', '7890 1234 5678','pass@123'),
(8, 'Phani',30, '1992-09-22', 'M', '+91 9876543217', '8901 2345 6789','pass@123'),
(9, 'Sophia Singh',40, '1983-02-14', 'F', '+91 9876543218', '9012 3456 7890','pass@123'),
(10, 'David Gupta',49, '1973-07-30', 'M', '+91 9876543219', '0123 4567 8901','pass@123');

CREATE TABLE doctor (
  doctor_id INT PRIMARY KEY,
  doctor_name VARCHAR(50),
  age INT,
  gender VARCHAR(10),
  DOB DATE,
  qualification VARCHAR(50),
  department VARCHAR(50),
  email VARCHAR(50),
  phone_num VARCHAR(20)
);
INSERT INTO doctor (doctor_id, doctor_name, age, gender, DOB, qualification, department, email, phone_num) VALUES
(1, 'Dr. Singh', 45, 'Male', '1978-05-12', 'MBBS, MD', 'Cardiology', 'singh@gmail.com', '+91 9876543220'),
(2, 'Dr. Shalini', 38, 'Female', '1985-09-22', 'MBBS, DDVL', 'Dermatology', 'Shalini@gmail.com', '+91 9876543221'),
(3, 'Dr. Joshua', 52, 'Male', '1971-02-01', 'MBBS, MS, MCh', 'Orthopedics', 'Joshua@gmail.com', '+91 9876543222'),
(4, 'Dr. Gupta', 41, 'Male', '1982-11-15', 'MBBS, MD', 'Gastroenterology', 'gupta@gmail.com', '+91 9876543223'),
(5, 'Dr. Navaneetha', 29, 'Female', '1993-08-05', 'MBBS, DCH', 'Pediatrics', 'Navaneetha@gmail.com', '+91 9876543224'),
(6, 'Dr. Johnson', 48, 'Male', '1975-12-31', 'MBBS, MS, DO', 'Ophthalmology', 'johnson@gmail.com', '+91 9876543225'),
(7, 'Dr. Venkat', 37, 'Male', '1986-06-18', 'MBBS, MD, DM', 'Neurology', 'Venkat@gmail.com', '+91 9876543226'),
(8, 'Dr. Khan', 43, 'Male', '1978-11-08', 'MBBS, MD, DM', 'Endocrinology', 'khan@gmail.com', '+91 9876543228'),
(9, 'Dr. Jyothi', 36, 'Female', '1987-07-14', 'MBBS, MD, DPM', 'Psychiatry', 'Jyothi@gmail.com', '+91 9876543229');

CREATE TABLE problem (
  department varchar(50),
  problem_name varchar(50),
  medicine varchar(50)
);

INSERT INTO problem (department, problem_name, medicine) VALUES
('Cardiology', 'Chest Pain', 'Lisinopril'),
('Cardiology', 'Fatigue', 'Metoprolol'),
('Cardiology', 'Arrhythmia', 'Amiodarone'),
('Dermatology', 'Acne', 'Benzoyl Peroxide'),
('Dermatology', 'Eczema', 'Hydrocortisone'),
('Dermatology', 'Psoriasis', 'Calcipotriene'),
('Orthopedics', 'Fractures', 'Ibuprofen'),
('Orthopedics', 'Sprains', 'Naproxen'),
('Orthopedics', 'Arthritis', 'Celecoxib'),
('Gastroenterology', 'Hepatitis', 'Loperamide'),
('Gastroenterology', 'GERD', 'Omeprazole'),
('Gastroenterology', 'Ulcerative Colitis', 'Mesalamine'),
('Pediatrics', 'Asthma', 'Albuterol'),
('Pediatrics', 'ADHD', 'Methylphenidate'),
('Pediatrics', 'Autism', 'Risperidone'),
('Ophthalmology', 'Cataracts', 'Artificial Tears'),
('Ophthalmology', 'Glaucoma', 'Latanoprost'),
('Ophthalmology', 'Dry Eyes', 'Cyclosporine'),
('Neurology', 'Migraines', 'Sumatriptan'),
('Neurology', "Parkinson's Disease", 'Levodopa'),
('Neurology', 'Epilepsy', 'Valproic Acid'),
('Endocrinology', 'Diabetes', 'Metformin'),
('Endocrinology', 'Thyroid Disorders', 'Levothyroxine'),
('Endocrinology', 'Hormonal Imbalances', 'Testosterone'),
('Psychiatry', 'Depression', 'Fluoxetine'),
('Psychiatry', 'Anxiety', 'Lorazepam'),
('Psychiatry', 'Bipolar Disorder', 'Lithium');

CREATE TABLE medicine (
  medicine_name VARCHAR(50) PRIMARY KEY,
  tablet1 VARCHAR(50),
  tablet1_cost DECIMAL(10,2),
  tablet2 VARCHAR(50),
  tablet2_cost DECIMAL(10,2)
);

INSERT INTO medicine (medicine_name, tablet1, tablet1_cost, tablet2, tablet2_cost) VALUES
('Lisinopril', 'Zestril', 15.00, 'Prinivil', 20.00),
('Metoprolol', 'Lopressor', 10.00, 'Toprol', 25.00),
('Amiodarone', 'Cordarone', 50.00, 'Nexterone', 75.00),
('Benzoyl Peroxide', 'Benzac AC', 5.00, 'PanOxyl', 8.00),
('Hydrocortisone', 'Cortizone-10', 7.50, 'Hydrocortone', 10.00),
('Calcipotriene', 'Dovonex', 40.00, 'Taclonex', 70.00),
('Ibuprofen', 'Advil', 3.50, 'Motrin', 5.00),
('Naproxen', 'Aleve', 4.00, 'Naprosyn', 6.00),
('Celecoxib', 'Celebrex', 20.00, 'Cobix', 25.00),
('Loperamide', 'Imodium', 5.00, 'Pepto Diarrhea', 7.00),
('Omeprazole', 'Prilosec', 10.00, 'Zegerid', 15.00),
('Mesalamine', 'Lialda', 80.00, 'Pentasa', 100.00),
('Albuterol', 'ProAir', 15.00, 'Ventolin', 20.00),
('Methylphenidate', 'Ritalin', 30.00, 'Concerta', 50.00),
('Risperidone', 'Risperdal', 40.00, 'Invega', 60.00),
('Artificial Tears', 'Refresh', 8.00, 'Systane', 10.00),
('Latanoprost', 'Xalatan', 50.00, 'Lumigan', 75.00),
('Cyclosporine', 'Restasis', 100.00, 'Cequa', 120.00),
('Sumatriptan', 'Imitrex', 25.00, 'Treximet', 35.00),
('Levodopa', 'Sinemet', 20.00, 'Stalevo', 30.00),
('Valproic Acid', 'Depakote', 40.00, 'Depakene', 50.00),
('Metformin', 'Glucophage', 5.00, 'Fortamet', 8.00),
('Levothyroxine', 'Synthroid', 10.00, 'Levoxyl', 15.00),
('Testosterone', 'Androderm', 150.00, 'Axiron', 200.00),
('Fluoxetine', 'Prozac', 20.00, 'Sarafem', 30.00),
('Lorazepam', 'Ativan', 10.00, NULL, NULL),
('Lithium', NULL, NULL, 'Lithobid', 50.00);


CREATE TABLE staff (
  staff_id INT PRIMARY KEY,
  staff_name VARCHAR(50),
  phonenumber VARCHAR(15),
  email VARCHAR(100),
  password VARCHAR(50)
);
INSERT INTO staff (staff_id, staff_name, phonenumber, email, password)
VALUES 
  (1, 'Sneha', '+91 9876543210', 'sneha.sharma@example.com', 'p@ssword123'),
  (2, 'Ankit', '+91 9876501234', 'ankit.Shalini@example.com', 'secur3pass'),
  (3, 'Ayesha', '+91 9876540123', 'ayesha.singh@example.com', 'myPassw0rd'),
  (4, 'Rajesh', '+91 9876502345', 'rajesh.kumar@example.com', 'passw0rd!'),
  (5, 'Rohit', '+91 9876545678', 'rohit.gupta@example.com', 'password123');

CREATE TABLE appointment (
appointment_id INT PRIMARY KEY,
patient_id INT,
doctor_name VARCHAR(50),
problem VARCHAR(50),
time DATETIME
);

INSERT INTO appointment (appointment_id, patient_id, doctor_name, problem, time) VALUES
(1, 1, 'Dr. Singh', 'Chest Pain', '2023-04-01 10:00:00'),
(2, 2, 'Dr. Shalini', 'Acne', '2023-04-02 10:30:00'),
(3, 3, 'Dr. Joshua', 'Sprains', '2023-04-03 14:00:00'),
(4, 4, 'Dr. Gupta', 'GERD', '2023-04-21 11:00:00'),
(5, 5, 'Dr. Navaneetha', 'Asthma', '2023-04-25 16:30:00'),
(6, 6, 'Dr. Johnson', 'Cataracts', '2023-04-23 10:30:00'),
(7, 1, 'Dr. Singh', 'Fatigue', '2023-04-24 11:00:00'),
(8, 3, 'Dr. Joshua', 'Arthritis', '2023-04-28 13:00:00'),
(9, 5, 'Dr. Navaneetha', 'ADHD', '2023-05-01 15:00:00'),
(10, 2, 'Dr. Shalini', 'Eczema', '2023-05-01 12:00:00');

CREATE TABLE prescription (
    prescription_number INT PRIMARY KEY,
    patient_id INT,
    problem VARCHAR(25),
    tablet1 VARCHAR(25),
    1_no_of_tablets INT,
    tablet2 VARCHAR(25),
    2_no_of_tablets INT,
    total_amount DECIMAL(10, 2)
);

INSERT INTO prescription (prescription_number, patient_id, problem, tablet1, 1_no_of_tablets, tablet2, 2_no_of_tablets, total_amount)
VALUES 
(1,1,'Chest Pain','Zestril',1,'Prinivil',2,355.00),
(2,2, 'Acne', 'Benzac AC', 1, 'PanOxyl',1,313.00),
(3,3, 'Sprains', 'Aleve', 4, 'Naprosyn',1,322.00),
(4,4, 'GERD', 'Prilosec', 1, 'Zegerid', 2,340.00);



-- Create primary keys
ALTER TABLE problem
ADD PRIMARY KEY (problem_name);

-- Create foreign key relationships
ALTER TABLE appointment
ADD CONSTRAINT fk_doctor_name
FOREIGN KEY (doctor_name)
REFERENCES doctor(doctor_name);

ALTER TABLE problem
ADD CONSTRAINT fk_department
FOREIGN KEY (department)
REFERENCES doctor(department);

ALTER TABLE appointment
ADD CONSTRAINT fk_problem
FOREIGN KEY (problem)
REFERENCES problem(problem_name);

ALTER TABLE problem
ADD CONSTRAINT fk_medicine
FOREIGN KEY (medicine)
REFERENCES medicine(medicine_name);

ALTER TABLE prescription
ADD CONSTRAINT fk_tablet1
FOREIGN KEY (tablet1)
REFERENCES medicine(medicine_name);

ALTER TABLE prescription
ADD CONSTRAINT fk_tablet2
FOREIGN KEY (tablet2)
REFERENCES medicine(medicine_name);
