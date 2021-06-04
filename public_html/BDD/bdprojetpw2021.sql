drop database bdprojetpw2021;

CREATE database bdprojetpw2021;

use bdprojetpw2021;

CREATE TABLE  domaine  (
 id_dom int(11) NOT NULL AUTO_INCREMENT,
 name varchar(255) NULL,
 /**pour pouvoir connaitre le niveau technique d'un employé, 
 par exemple un technicien, un ingénieur ou un intérimaire*/
 niveau varchar(255),
PRIMARY KEY ( id_dom )
) ;

/** Un employé a un identifiant, un nom, un prenom et un sexe*/

CREATE TABLE  employe  (
 id_emp int(11) NOT NULL AUTO_INCREMENT,
 nom varchar(255) NULL,
 prenom varchar(255) NULL,
 sexe varchar(1) NULL,
 /**on veut pouvoir acceder au domaine de l'employé 
 donc une clé étrangère de la table domaine*/
 id_dom int(11),
PRIMARY KEY ( id_emp ),
FOREIGN KEY (id_dom) REFERENCES domaine(id_dom)
) ;

/**Un utilisateur va avoir un e-mail, un login et un mot de passe 
pour pouvoir se connecter */

CREATE TABLE  user  (
 id_user int(11) NOT NULL AUTO_INCREMENT,
 mail varchar(255) NULL,
 login varchar(255) NULL,
 password varchar(255) NULL,
 /**on veut differencer un compte admin d'un compte visiteur*/
 typecompte varchar(255) NULL,
 /**on veut pouvoir activer ou desactiver un compte*/
 etat int(1),
PRIMARY KEY ( id_user )
) ;

insert into domaine(name,niveau) values
	('informatique', 'fac'),
	('commerce','ecole'),
	('technicien','bac'),
	('managment','fac'),
	('ingenierie','ecole');

insert into user(mail,login,password,typecompte,etat) values
	('projectofpw@gmail.com','admin',md5('mdp'),'ADMIN','1'),
	('bah1999moussa@gmail.com','user1',md5('123'),'VISITEUR','0'),
	('mehdimami1999@gmail.com','mehdi',md5('1234'),'VISITEUR','1');

insert into employe(nom,prenom,sexe,id_dom) values
	('abatan','thony','M',1),
	('ath','konan','M',2),
	('aure','leana','F',3),
	('mitchel','serena','F',1),
	('karma','jean-pierre','H',2),		
	('lemoche','thomas','M',3),
		
	('abatan','thony','M',1),
	('ath','konan','M',2),
	('aure','leana','F',3),
	('mitchel','serena','F',1),
	('karma','jean-pierre','H',2),	
	('lemoche','thomas','M',3);

select * from domaine;
select * from user;
select * from employe;
select nom,prenom from employe;
select login,password from user;
		


