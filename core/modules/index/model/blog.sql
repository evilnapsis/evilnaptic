create database evilnaptic;
use evilnaptic;

create table user(
	id int not null auto_increment primary key,
	name varchar(50) not null,
	lastname varchar(50) not null,
	username varchar(50),
	email varchar(255) not null,
	address varchar(255) not null,
	phone varchar(20) not null,
	birth_at date,
	bio varchar(500),
	password varchar(60) not null,
	image varchar(255),
	is_active boolean not null default 1,
	is_admin boolean not null default 0,
	created_at datetime not null
);

insert into user (name,lastname,email,password,is_admin) value ("Agustin","Ramos","evilnapsis@gmail.com","96f960d318379175afcc47a9ed670bc7958e4f2e",1);

create table category (
	id int not null auto_increment primary key,
	name varchar(200) not null,
	preffix varchar(200) not null
);

insert into category (name,preffix) value ("Desarrollo Web","web");
insert into category (name,preffix) value ("Desarrollo Mobile","mobile");
insert into category (name,preffix) value ("Desarrollo Escritorio","desktop");
insert into category (name,preffix) value ("Computacion en la nube","cloud");


create table level (
	id int not null auto_increment primary key,
	name varchar(200) not null,
	preffix varchar(200) not null
);

insert into level (name,preffix) value ("Basico","basic");
insert into level (name,preffix) value ("Intermedio","intermediate");
insert into level (name,preffix) value ("Avanzado","advanced");
insert into level (name,preffix) value ("Experto","expert");
insert into level (name,preffix) value ("Trivial","trivial");

create table kind2 (
	id int not null auto_increment primary key,
	name varchar(200) not null,
	preffix varchar(200) not null
);


insert into kind2 (name) value ("Curso");
insert into kind2 (name) value ("How to");
insert into kind2 (name) value ("Documentacion");
insert into kind2 (name) value ("Tema");


create table course (
	id int not null auto_increment primary key,
	code varchar(200) ,
	name varchar(200) not null,
	description varchar(1000) not null,
	image varchar(255),	
	is_public boolean not null default 0,
	is_principal boolean not null default 0,
	is_open boolean not null default 0,
	created_at datetime not null,
	user_id int not null,
	category_id int not null,
	level_id int not null,
	kind2_id int not null,
	foreign key(kind2_id) references kind2(id),
	foreign key(level_id) references level(id),
	foreign key(category_id) references category(id),
	foreign key(user_id) references user(id)
);

create table topic (
	id int not null auto_increment primary key,
	no varchar(200) not null,
	name varchar(200) not null,
	description varchar(1000) not null,
	is_public boolean not null default 0,
	created_at datetime not null,
	course_id int not null,
	foreign key(course_id) references course(id)
);

create table lecture (
	id int not null auto_increment primary key,
	code varchar(200) ,
	title varchar(200) not null,
	content text not null,
	is_public boolean not null default 0,
	created_at datetime not null,
	topic_id int not null,
	foreign key(topic_id) references topic(id)
);

create table user_course (
	id int not null auto_increment primary key,
	created_at datetime not null,
	user_id int not null,
	course_id int not null,
	foreign key(course_id) references course(id),
	foreign key(user_id) references user(id)
);

create table lecture_feedback (
	id int not null auto_increment primary key,
	is_readed boolean not null default 0,
	is_understanded boolean not null default 0,
	is_calified boolean not null default 0,
	calification int not null,
	comment varchar(500),
	created_at datetime not null,
	user_id int not null,
	lecture_id int not null,
	foreign key(lecture_id) references lecture(id),
	foreign key(user_id) references user(id)
);

create table question (
	id int not null auto_increment primary key,
	question varchar(500),
	answer varchar(500),
	is_readed boolean not null default 0,
	is_public boolean not null default 0,
	user_id int not null,
	lecture_id int not null,
	created_at datetime not null,
	foreign key(lecture_id) references lecture(id),
	foreign key(user_id) references user(id)
);

create table bug (
	id int not null auto_increment primary key,
	title varchar(200) not null,
	content varchar(1000) not null,
	is_important boolean not null default 0,
	created_at datetime not null,
	user_id int not null,
	foreign key(user_id) references user(id)
);

create table cat (
	id int not null auto_increment primary key,
	name varchar(200) not null,
	preffix varchar(200) not null,
	icon varchar(50)
);


insert into cat (name,preffix,icon) value ("Tecnologia","tecnologia","fa fa-laptop");
insert into cat (name,preffix,icon) value ("Desarrollo","desarrollo","");
insert into cat (name,preffix,icon) value ("Notas","notas","");
insert into cat (name,preffix,icon) value ("Programacion","programacion","fa fa-code");
insert into cat (name,preffix,icon) value ("StartUps","startups","");
insert into cat (name,preffix,icon) value ("Ciencia","ciencia","fa fa-flask");
insert into cat (name,preffix,icon) value ("Ingenieria","ingenieria","fa fa-code");
insert into cat (name,preffix,icon) value ("Espacio","espacio","fa fa-rocket");
insert into cat (name,preffix,icon) value ("Personal","personal","fa fa-male");


insert into cat (name,preffix,icon) value ("Desarrollo Web","desarrollo-web","");
insert into cat (name,preffix,icon) value ("Tecnologia Microsoft","tecnologia-microsoft","");


create table kind (
	id int not null auto_increment primary key,
	name varchar(200) not null,
	preffix varchar(200) not null
);


insert into kind (name) value ("Articulo");
insert into kind (name) value ("Tip");
insert into kind (name) value ("Noticia");
insert into kind (name) value ("Nota");

create table display_img (
	id int not null auto_increment primary key,
	name varchar(200) not null,
	preffix varchar(200) not null
);


insert into display_img (name) value ("Arriba");
insert into display_img (name) value ("Abajo");
insert into display_img (name) value ("Izquierda");
insert into display_img (name) value ("Derecha");


create table post (
	id int not null auto_increment primary key,
	code varchar(200) ,
	title varchar(200) not null,
	brief varchar(500) not null,
	content text not null,
	image varchar(255) not null,
	video varchar(255) not null,
	is_public boolean not null default 0,
	show_image boolean not null default 0,
	is_principal boolean not null default 0,
	is_sidebar boolean not null default 0,
	created_at datetime not null,
	cat_id int not null,
	user_id int not null,
	kind_id int not null,
	display_img_id int,
	foreign key(kind_id) references kind(id),
	foreign key(user_id) references user(id),
	foreign key(display_img_id) references display_img(id),
	foreign key(cat_id) references cat(id)
);

/** **/
create table project (
	id int not null auto_increment primary key,
	title varchar(200) not null,
	preffix varchar(200) not null,
	short_name varchar(200) not null,
	description varchar(1000) not null,
	resume text not null,
	is_principal boolean not null default 0,
	is_public boolean not null default 0,
	created_at datetime not null,
	price float not null
	);

create table image (
	id int not null auto_increment primary key,
	code varchar(12) not null,
	title varchar(200) not null,
	description varchar(200) not null,
	image varchar(255),	
	is_public boolean not null default 0,
	is_principal boolean not null default 0,
	is_slide boolean not null default 0,
	position int not null,
	project_id int not null,
	created_at datetime not null,
	foreign key (project_id) references project(id)	
);

/** tags update **/

create table tag (
	id int not null auto_increment primary key,
	name varchar(200) not null
	);

create table post_tag (
	post_id int not null,
	tag_id int not null,
	foreign key (tag_id) references tag(id),
	foreign key (post_id) references post(id)	
);

/** **/

create table slide (
	id int not null auto_increment primary key,
	title varchar(200) not null,
	title_link varchar(200) not null,
	subtitle varchar(200) not null,
	subtitle_link varchar(200) not null,
	image varchar(255),	
	video varchar(255),	
	button_class varchar(200) not null,
	button_text varchar(200) not null,
	button_link varchar(200) not null,
	is_public boolean not null default 0,
	link varchar(200) not null,
	position int not null,
	created_at datetime not null
);

create table post_view(
	id int not null auto_increment primary key,
	viewer_id int,
	post_id int null,
	created_at datetime not null,
	realip varchar(16) not null,
	foreign key (viewer_id) references user(id),
	foreign key (post_id) references post(id)
);


create table status (
	id int not null auto_increment primary key,
	code varchar(200) ,
	brief varchar(500) not null,
	image varchar(255) not null,
	video varchar(255) not null,
	is_public boolean not null default 0,
	user_id int not null,
	foreign key(user_id) references user(id)
);


/** Comments System**/

create table comment (
	id int not null auto_increment primary key,
	entry_id int ,
	ref_id varchar(500) not null,
	name varchar(50) not null,
	email varchar(255) not null,
	comment text not null,
	status int not null,
	comment_id int,
	created_at datetime not null,
	is_readed boolean not null default 0,
	foreign key(comment_id) references comment(id)
);

	