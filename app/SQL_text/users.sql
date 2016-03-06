CREATE TABLE `users` (  
  id int UNSIGNED NOT NULL auto_increment,  
  username varchar(255) NOT NULL,  
  password varchar(32) NOT NULL, 
  create_time INT UNSIGNED NOT NULL,  
  is_delete TINYINT UNSIGNED NOT NULL,
  PRIMARY KEY  (`id`)  
)  