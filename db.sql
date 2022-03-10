create database tutorial;
use tutorial;
create table t_mundo  (id int auto_increment,
						id_continente int,
                        pais varchar(50),
						primary key(id));

create table usuarios  (id int auto_increment,
                        nombre varchar(50),
                        hobby varchar(50),
                        primary key(id));

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
                        
INSERT into t_mundo values (null,1,'Mexico'),(null,1,'Venezuela'),
							(null,1,'Chile'),(null,1,'Bolivia'),
							(null,1,'Peru'),(null,2,'Japon'),
                            (null,2,'Corea'),(null,2,'Indonesia'),
                            (null,2,'Filipinas'),(null,2,'Singapur'),
                            (null,3,'Italia'),(null,3,'España'),
                            (null,3,'Francia'),(null,3,'Inglaterra'),
                            (null,3,'Holanda'),(null,4,'Argelia'),
                            (null,4,'Marruecos'),(null,4,'Mozambique'),
                            (null,4,'Ruanda'),(null,4,'Sierra Leona');