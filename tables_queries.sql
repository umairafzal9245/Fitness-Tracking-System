DROP TABLE MEMBER CASCADE CONSTRAINTS;
DROP TABLE PLAN CASCADE CONSTRAINTS;
DROP TABLE DAILY_LOG CASCADE CONSTRAINTS;
DROP TABLE NUTRITION CASCADE CONSTRAINTS;
DROP TABLE WORKOUT CASCADE CONSTRAINTS;
DROP TABLE EXERCISE CASCADE CONSTRAINTS;
DROP TABLE MUSCLE CASCADE CONSTRAINTS;
DROP TABLE DIET CASCADE CONSTRAINTS;

Prompt ******  Creating PLAN table ....

CREATE TABLE PLAN (
	plan_id NUMBER(4) CONSTRAINT plan_id_pk PRIMARY KEY,
	type VARCHAR2(10),
	purpose VARCHAR2(30),
	duration VARCHAR2(30)
);


Prompt ******  Creating MEMBER table ....

CREATE TABLE MEMBER (
	member_id NUMBER(4) CONSTRAINT member_id_pk PRIMARY KEY,
	username varchar2(30),
	password varchar2(30) NOT NULL,
	plan_id NUMBER(4),
	name VARCHAR2(30),
	age NUMBER(4),
	gender VARCHAR2(10),
	weight NUMBER(4),
	phone_no VARCHAR2(30),
	address VARCHAR2(30),
	BMI  NUMBER(5,2),
CONSTRAINT member_un_uk UNIQUE(username),
CONSTRAINT member_planid_fk FOREIGN KEY (plan_id) REFERENCES PLAN(plan_id)
);





Prompt ******  Creating DAILY_LOG table ....


CREATE TABLE DAILY_LOG (
	log_no NUMBER(4) CONSTRAINT dailylog_log_pk PRIMARY KEY,
	member_id NUMBER(4),
	c_date VARCHAR2(15) NOT NULL,
CONSTRAINT dailylog_mid_fk FOREIGN KEY (member_id) REFERENCES MEMBER(member_id)
);


Prompt ******  Creating NUTRITION table ....

CREATE TABLE NUTRITION (
	plan_id NUMBER(4),
	vitamin_intake VARCHAR2(10),
	fat_intake VARCHAR2(10),
	carbohydrate_intake VARCHAR2(10),
	protein_intake VARCHAR2(10),
	total_calories VARCHAR(10),
CONSTRAINT nutrition_planid_fk FOREIGN KEY (plan_id) REFERENCES PLAN(plan_id)
);


Prompt ******  Creating WORKOUT table ....
CREATE TABLE WORKOUT (
	workout_id NUMBER(4) CONSTRAINT workout_id_pk PRIMARY KEY,
	plan_id NUMBER(4),
	targeted_muscles VARCHAR2(30),
	workout_days NUMBER(4),
	workout_time VARCHAR(20),
CONSTRAINT workout_planid_fk FOREIGN KEY (plan_id) REFERENCES PLAN(plan_id)
);


Prompt ******  Creating EXERCISE table ....


CREATE TABLE EXERCISE(
	workout_id NUMBER(4) ,
	name VARCHAR(30),
	equipment VARCHAR2(30),
	total_reps NUMBER(4),
CONSTRAINT exercise_wid_fk FOREIGN KEY (workout_id) REFERENCES WORKOUT(workout_id)
);

Prompt ******  Creating MUSCLE table ....


CREATE TABLE MUSCLE (
	log_no NUMBER(4),
	muscle_change VARCHAR2(20),
	weight_change VARCHAR(20),
	bmi_change NUMBER(5,2),
CONSTRAINT muscle_lno_fk FOREIGN KEY (log_no) REFERENCES DAILY_LOG(log_no)
);


Prompt ******  Creating DIET table ...

CREATE TABLE DIET (
	log_no NUMBER(4),
	food_type VARCHAR(10),
	fat VARCHAR(10),
	carbohydrate VARCHAR(10),
	protein VARCHAR(10),
	total_calories VARCHAR(10),
CONSTRAINT diet_lno_fk FOREIGN KEY (log_no) REFERENCES DAILY_LOG(log_no)
);


SET SERVEROUTPUT ON;

CREATE OR REPLACE TRIGGER tr_member
AFTER  INSERT ON MEMBER
FOR EACH ROW
ENABLE
DECLARE
v_user VARCHAR2(15);
BEGIN
SELECT
user INTO v_user FROM dual;
DBMS_OUTPUT.PUT_LINE('Insertion for MEMBER table');
END;
/

CREATE OR REPLACE TRIGGER tr_plan
AFTER  INSERT ON PLAN
FOR EACH ROW
ENABLE
DECLARE
v_user VARCHAR2(15);
BEGIN
SELECT
user INTO v_user FROM dual;
DBMS_OUTPUT.PUT_LINE('Insertion for PLAN table');
END;
/

CREATE OR REPLACE TRIGGER tr_daily_log
AFTER  INSERT ON daily_log
FOR EACH ROW
ENABLE
DECLARE
v_user VARCHAR2(15);
BEGIN
SELECT
user INTO v_user FROM dual;
DBMS_OUTPUT.PUT_LINE('Insertion for daily log table');
END;
/



CREATE OR REPLACE TRIGGER tr_diet
AFTER  INSERT ON DIET
FOR EACH ROW
ENABLE
DECLARE
v_user VARCHAR2(15);
BEGIN
SELECT
user INTO v_user FROM dual;
DBMS_OUTPUT.PUT_LINE('Insertion for DIET table');
END;
/



CREATE OR REPLACE TRIGGER tr_Workout
AFTER  INSERT ON WORKOUT
FOR EACH ROW
ENABLE
DECLARE
v_user VARCHAR2(15);
BEGIN
SELECT
user INTO v_user FROM dual;
DBMS_OUTPUT.PUT_LINE('Insertion for WORKOUT table');
END;
/



CREATE OR REPLACE TRIGGER tr_nutrition
AFTER  INSERT ON NUTRITION
FOR EACH ROW
ENABLE
DECLARE
v_user VARCHAR2(15);
BEGIN
SELECT
user INTO v_user FROM dual;
DBMS_OUTPUT.PUT_LINE('Insertion for NUTRITION table');
END;
/



CREATE OR REPLACE TRIGGER tr_Exercise
AFTER  INSERT ON EXERCISE
FOR EACH ROW
ENABLE
DECLARE
v_user VARCHAR2(15);
BEGIN
SELECT
user INTO v_user FROM dual;
DBMS_OUTPUT.PUT_LINE('Insertion for EXERCISE table');
END;
/

CREATE OR REPLACE TRIGGER tr_muscle
AFTER  INSERT ON MUSCLE
FOR EACH ROW
ENABLE
DECLARE
v_user VARCHAR2(15);
BEGIN
SELECT
user INTO v_user FROM dual;
DBMS_OUTPUT.PUT_LINE('Insertion for MUSCLE table');
END;
/





insert into PLAN VALUES(1,'standard','lose weight',9000,'90 days');
insert into PLAN VALUES(2,'standard','gain weight',6000,'60 days');
insert into PLAN VALUES(3,'standard','maintain weight',3000,'30 days');

insert into MEMBER VALUES(1,'harveyspectre','1234',1,'Harvey Spectre',35,'m',75, '+011234559603' ,'Pearson Spectre',23.5);
insert into MEMBER VALUES(2,'michealross','1234',2,'Micheal Ross',25,'m',65,'+011999859603','Pearson Hardman',20.5);
insert into MEMBER VALUES(3,'louislitt','1234',1,'Louis Litt',33,'m',85,'+011238990603','Pearson Litt',25.5);
insert into MEMBER VALUES(4,'rachelzane','1234',2,'Rachel Zane',33,'f',55,'+065595590603','Pearson Hardman',19.0);



insert into NUTRITION VALUES(1,'300 IU','100 IU','500 IU','200 IU','1000 kcal');
insert into NUTRITION VALUES(2,'500 IU','500 IU','800 IU','400 IU','2200 kcal');
insert into NUTRITION VALUES(3,'400 IU','300 IU','700 IU','300 IU','1700 kcal');

insert into WORKOUT VALUES(1,1,'chest',75,'1 hour/day');
insert into WORKOUT VALUES(2,1,'leg',50,'1 hour/day');
insert into WORKOUT VALUES(3,1,'biceps',75,'1 hour/day');

insert into WORKOUT VALUES(4,2,'chest',20,'1/2 hour/day');
insert into WORKOUT VALUES(5,2,'leg',30,'1/2 hour/day');
insert into WORKOUT VALUES(6,2,'biceps',40,'1/2 hour/day');

insert into WORKOUT VALUES(7,3,'chest',10,'1/2 hour/day');
insert into WORKOUT VALUES(8,3,'leg',5,'1/2 hour/day');
insert into WORKOUT VALUES(9,3,'biceps',15,'1/2 hour/day');

insert into EXERCISE VALUES(1,'pushups','exercise mat(optional)',25);
insert into EXERCISE VALUES(1,'incline dumbell curl','dumbells',25);
insert into EXERCISE VALUES(2,'squats','weights(optional)',25);
insert into EXERCISE VALUES(3,'chin-ups','bar',25);

insert into EXERCISE VALUES(4,'pushups','exercise mat(optional)',10);
insert into EXERCISE VALUES(4,'incline dumbell curl','dumbells',10);
insert into EXERCISE VALUES(5,'squats','weights(optional)',10);
insert into EXERCISE VALUES(6,'chin-ups','bar',10);

insert into EXERCISE VALUES(7,'pushups','exercise mat(optional)',15);
insert into EXERCISE VALUES(7,'incline dumbell curl','dumbells',15);
insert into EXERCISE VALUES(8,'squats','weights(optional)',15);
insert into EXERCISE VALUES(9,'chin-ups','bar',15);

insert into DAILY_LOG VALUES(1,1,'06/11/2021');
insert into DAILY_LOG VALUES(2,1,'07/11/2021');
insert into DAILY_LOG VALUES(3,1,'08/11/2021');

insert into DAILY_LOG VALUES(4,2,'06/11/2021');
insert into DAILY_LOG VALUES(5,2,'07/11/2021');
insert into DAILY_LOG VALUES(6,2,'08/11/2021');

insert into DAILY_LOG VALUES(7,3,'06/11/2021');
insert into DAILY_LOG VALUES(8,3,'07/11/2021');
insert into DAILY_LOG VALUES(9,3,'08/11/2021');


insert into MUSCLE VALUES(1,'no change','no change', 0.0);
insert into MUSCLE VALUES(2,'01 cm inc','0.4 kg loss', 0.1);
insert into MUSCLE VALUES(3,'01 cm inc','0.2 kg gain', 0.0);

insert into MUSCLE VALUES(4,'no change','no change', 0.0);
insert into MUSCLE VALUES(5,'01 cm inc','0.4 kg gain', 0.1);
insert into MUSCLE VALUES(6,'01 cm inc','0.2 kg gain', 0.0);

insert into MUSCLE VALUES(7,'no change','no change', 0.0);
insert into MUSCLE VALUES(8,'01 cm inc','0.3 kg gain', 0.1);
insert into MUSCLE VALUES(9,'01 cm dec','0.2 kg gain', 0.0);


insert into DIET VALUES(1,'fish','150 IU','400 IU','100 IU','650 kcal');
insert into DIET VALUES(2,'beef','290 IU','400 IU','100 IU','790 kcal');
insert into DIET VALUES(3,'chicken','150 IU','400 IU','340 IU','890 kcal');

insert into DIET VALUES(4,'fish','150 IU','400 IU','100 IU','650 kcal');
insert into DIET VALUES(5,'beef','290 IU','400 IU','100 IU','790 kcal');
insert into DIET VALUES(6,'chicken','150 IU','400 IU','340 IU','890 kcal');

insert into DIET VALUES(7,'fish','150 IU','400 IU','100 IU','650 kcal');
insert into DIET VALUES(8,'beef','290 IU','400 IU','100 IU','790 kcal');
insert into DIET VALUES(9,'chicken','150 IU','400 IU','340 IU','890 kcal');

