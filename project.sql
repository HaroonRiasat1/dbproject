CREATE TABLE Proj_Muscle(
muscle_id Int,
name Varchar2(32)
);

ALTER TABLE Proj_Muscle
ADD CONSTRAINT PK_PROJ_M PRIMARY KEY(muscle_id);

CREATE TABLE Proj_Exercise(
exercise_id Int,
time int,
name Varchar2(32) NOT NULL,
description Varchar2(256) NOT NULL,
equipment Varchar2(128)
);

ALTER TABLE Proj_Exercise
ADD CONSTRAINT PK_PROJ_E PRIMARY KEY(exercise_id);

CREATE TABLE Proj_MuscleExercise(
exercise_id Int,
muscle_id Int);

ALTER TABLE Proj_MuscleExercise
ADD CONSTRAINT PK_PROJ_ME PRIMARY KEY(exercise_id, muscle_id);

ALTER TABLE Proj_MuscleExercise
ADD CONSTRAINT FK_PROJ_ME_E FOREIGN KEY(exercise_id) REFERENCES Proj_Exercise(exercise_id);

ALTER TABLE Proj_MuscleExercise
ADD CONSTRAINT FK_PROJ_ME_M FOREIGN KEY(muscle_id) REFERENCES Proj_Muscle(muscle_id);

CREATE TABLE Proj_Nutrition(
nutrition_id Int,
name Varchar2(32) NOT NULL,
description Varchar2(256) NOT NULL,
allowance Int NOT NULL,
intake Int NOT NULL
);

ALTER TABLE Proj_Nutrition
ADD CONSTRAINT PK_PROJ_N PRIMARY KEY(nutrition_id);

CREATE TABLE Proj_Plan(
plan_id Int,
duration Int NOT NULL);

ALTER TABLE Proj_Plan
ADD CONSTRAINT PK_PROJ_P PRIMARY KEY(plan_id);

CREATE TABLE Proj_Demands(
plan_id Int,
eno Int,
exercise_id Int,
amount Int NOT NULL,
progress Int);

ALTER TABLE Proj_Demands
ADD CONSTRAINT PK_PROJ_D PRIMARY KEY(plan_id, eno, exercise_id);

ALTER TABLE Proj_Demands
ADD CONSTRAINT FK_PROJ_D_P FOREIGN KEY(plan_id) REFERENCES Proj_Plan(plan_id);

ALTER TABLE Proj_Demands
ADD CONSTRAINT FK_PROJ_D_E FOREIGN KEY(exercise_id) REFERENCES Proj_Exercise(exercise_id);

CREATE TABLE Proj_Requires(
plan_id Int,
nno Int,
nutrition_id Int,
progress Int);

ALTER TABLE Proj_Requires
ADD CONSTRAINT FK_PROJ_R_P FOREIGN KEY(plan_id) REFERENCES Proj_Plan(plan_id);

ALTER TABLE Proj_Requires
ADD CONSTRAINT FK_PROJ_R_N FOREIGN KEY(nutrition_id) REFERENCES Proj_Exercise(nutrition_id);

CREATE TABLE Proj_Member(
mem_id Int,
birth_date Date,
fname Varchar2(32),
lname Varchar2(32));

ALTER TABLE Proj_Member
ADD CONSTRAINT PK_PROJ_MEM PRIMARY KEY(mem_id);



CREATE SEQUENCE mem_id_sequence
  MINVALUE 1
  MAXVALUE 999999999999999999999999999
  START WITH 1
  INCREMENT BY 1
  CACHE 20;



CREATE SEQUENCE mem_body_sequence
  MINVALUE 1
  MAXVALUE 999999999999999999999999999
  START WITH 1
  INCREMENT BY 1
  CACHE 20;



CREATE SEQUENCE planno
  MINVALUE 1
  MAXVALUE 999999999999999999999999999
  START WITH 4
  INCREMENT BY 1
  CACHE 20;


CREATE SEQUENCE mus
  MINVALUE 1
  MAXVALUE 999999999999999999999999999
  START WITH 4
  INCREMENT BY 1
  CACHE 20;

CREATE SEQUENCE ex
  MINVALUE 1
  MAXVALUE 999999999999999999999999999
  START WITH 4
  INCREMENT BY 1
  CACHE 20;

CREATE SEQUENCE nut
  MINVALUE 1
  MAXVALUE 999999999999999999999999999
  START WITH 4
  INCREMENT BY 1
  CACHE 20;

CREATE SEQUENCE pd
  MINVALUE 1
  MAXVALUE 999999999999999999999999999
  START WITH 4
  INCREMENT BY 1
  CACHE 20;

CREATE SEQUENCE PR
  MINVALUE 1
  MAXVALUE 999999999999999999999999999
  START WITH 4
  INCREMENT BY 1
  CACHE 20;


	CREATE SEQUENCE PA
  MINVALUE 1
  MAXVALUE 999999999999999999999999999
  START WITH 4
  INCREMENT BY 1
  CACHE 20;


	CREATE SEQUENCE PA
  MINVALUE 1
  MAXVALUE 999999999999999999999999999
  START WITH 4
  INCREMENT BY 1
  CACHE 20;





CREATE TABLE Proj_Adopts(
mem_id Int,
pno Int,
plan_id Int);

ALTER TABLE Proj_Adopts
ADD CONSTRAINT PK_PROJ_A PRIMARY KEY(mem_id, pno, plan_id);

ALTER TABLE Proj_Adopts
ADD CONSTRAINT FK_PROJ_A_P FOREIGN KEY(plan_id) REFERENCES Proj_Plan(plan_id);

ALTER TABLE Proj_Adopts
ADD CONSTRAINT FK_PROJ_A_M FOREIGN KEY(mem_id) REFERENCES Proj_Member(mem_id);

CREATE TABLE Proj_Credentials(
email Varchar2(32),
username Varchar2(32),
password Varchar2(32),
timestamp Date,
mem_id Int);

ALTER TABLE Proj_Credentials
ADD CONSTRAINT PK_PROJ_C PRIMARY KEY(email, username, password);

ALTER TABLE Proj_Credentials
ADD CONSTRAINT FK_PROJ_C_M FOREIGN KEY(mem_id) REFERENCES Proj_Member(mem_id);

CREATE TABLE Proj_BodyData(
mem_id Int,
bno Int,
height float NOT NULL,
weight float NOT NULL,
timestamp date);

ALTER TABLE Proj_BodyData
ADD CONSTRAINT PK_PROJ_BD PRIMARY KEY(mem_id, bno);

ALTER TABLE Proj_BodyData
ADD CONSTRAINT FK_PROJ_BD FOREIGN KEY(mem_id) REFERENCES Proj_Member(mem_id);

CREATE OR REPLACE TRIGGER mem_trigg
BEFORE INSERT ON Proj_Member
FOR EACH ROW
	WHEN (new.mem_id IS NULL)
BEGIN
	:new.mem_id := mem_id_sequence.nextval;
END;
/

CREATE OR REPLACE TRIGGER bodydata_trigg
BEFORE INSERT ON Proj_BodyData
FOR EACH ROW
	WHEN (new.bno IS NULL)
BEGIN
	:new.bno := mem_body_sequence.nextval;
END;
/

CREATE OR REPLACE TRIGGER muscle_trig
BEFORE INSERT ON Proj_Muscle
FOR EACH ROW
	WHEN (new.muscle_id IS NULL)
BEGIN
	:new.muscle_id := mus.nextval;
END;
/

CREATE OR REPLACE TRIGGER exercise_trig
BEFORE INSERT ON Proj_Exercise
FOR EACH ROW
	WHEN (new.exercise_id IS NULL)
BEGIN
	:new.exercise_id := ex.nextval;
END;
/

CREATE OR REPLACE TRIGGER nut_trig
BEFORE INSERT ON Proj_Nutrition
FOR EACH ROW
	WHEN (new.nutrition_id IS NULL)
BEGIN
	:new.nutrition_id := nut.nextval;
END;
/

CREATE OR REPLACE TRIGGER exercise_demands_trigg
BEFORE INSERT ON Proj_Demands
FOR EACH ROW
	WHEN (new.eno IS NULL)
BEGIN
	:new.eno := pd.nextval;
END;
/

CREATE OR REPLACE TRIGGER exercise_requires_trigg
BEFORE INSERT ON Proj_Requires
FOR EACH ROW
	WHEN (new.nno IS NULL)
BEGIN
	:new.nno := pr.nextval;
END;
/

CREATE OR REPLACE TRIGGER adopts_trigg
BEFORE INSERT ON Proj_Adopts
FOR EACH ROW
	WHEN (new.pno IS NULL)
BEGIN
	:new.pno := pa.nextval;
END;
/