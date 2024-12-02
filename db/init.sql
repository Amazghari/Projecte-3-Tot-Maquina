use totmaquina;

-- Primer init sin fk para probar que funciona
create table machines (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
	model VARCHAR(255),
	manufacturer VARCHAR(255),
	serial_num VARCHAR(255),
	installation_date DATE,
	location VARCHAR(255),
	image_url VARCHAR(255),
	first_answer VARCHAR(255)
);
insert into machines (model,manufacturer,serial_num,installation_date,location,image_url,first_answer) 
values("model1","manufacturer1","serialNumbe1",CURDATE(),"location1","image1","first_answer");
-- select * from machines;
create table users(
	id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(255),
	surname varchar(255),
	img varchar(255),
	email varchar(255),
	role varchar(255),
	username varchar(255),
	password varchar(255)
);
insert into users (name,surname,img,email,role,username,password)values
("admin","admin","supuestaurl","admin@test.com","administrator","admin","$2y$10$axv2WdgCaQqzp870IsMEG.L4TNSRRFD6u3W.7IIw7Tsp4PS1RMhEy");
insert into users (name,surname,img,email,role,username,password)values
("tecnico","tecnico","supuestaurl","tecnico@test.com","tecnico","tecnico","$2y$10$axv2WdgCaQqzp870IsMEG.L4TNSRRFD6u3W.7IIw7Tsp4PS1RMhEy");
insert into users (name,surname,img,email,role,username,password)values
("supervisor","supervisor","supuestaurl","supervisor@test.com","supervisor","supervisor","$2y$10$axv2WdgCaQqzp870IsMEG.L4TNSRRFD6u3W.7IIw7Tsp4PS1RMhEy");
insert into users (name,surname,img,email,role,username,password)values
("usuario","usuario","supuestaurl","usuario@test.com","usuario","usuario","$2y$10$axv2WdgCaQqzp870IsMEG.L4TNSRRFD6u3W.7IIw7Tsp4PS1RMhEy");
-- contraseña 12345678
-- select * from users;
create table incidence(
	id int AUTO_INCREMENT PRIMARY KEY,
	state varchar(255),
	priority varchar(255),
	description varchar(255),
	starting_date varchar(255),
	end_date varchar(255),
	imputed_hours varchar(255),
	first_answer varchar(255),
	id_machine int
);

create table maintenance(
	id int AUTO_INCREMENT PRIMARY KEY,
	state varchar(255),
	type varchar(255),
	description varchar(255),
	status varchar(255),
	id_machine int
);
insert into incidence (state,priority,description,starting_date,end_date,
imputed_hours,first_answer,id_machine) values
("unresolved","high","description1","today","tomorrow","2","2","1");

create table user_incidence(
	id int AUTO_INCREMENT PRIMARY key,
	id_user int,
	id_incidence int
);
insert into user_incidence (id_user,id_incidence) values (1,1);

create table user_machine(
	id int AUTO_INCREMENT PRIMARY key,
	id_user int,
	id_machine int
);
insert into user_machine (id_user,id_machine) values (1,1);

create table user_maintenance(
	id int AUTO_INCREMENT PRIMARY key,
	id_user int,
	id_maintenance int
);
insert into user_maintenance (id_user,id_maintenance) values (1,1);
