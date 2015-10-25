/* 
* Configuração SQL do site DoeSangue.me
*/
 create schema doesangue_me;
 	use doesangue_me;


/* tabela users */
create table if not exists `users`(
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`login` VARCHAR(40) NOT NULL,
	`email` VARCHAR(50) NOT NULL,
	`password` VARCHAR(40) NOT NULL,
	`data_cadastro` timestamp DEFAULT CURRENT_TIMESTAMP
)ENGINE=MyISAM CHARSET=utf8;

/* tabela Dadores*/
create table if not exists `doadores`(
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`nome` VARCHAR(20) NOT NULL,
	`sobrenome` VARCHAR(20) NOT NULL,
	`gp_sangue` INT NOT NULL,
	`user_id` INT NOT NULL,
	`nascimento` date
)ENGINE=MyISAM CHARSET=utf8;


/* tabela	gruposanguineo*/
create table if not exists `gruposanguineo`(
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`nome` VARCHAR(40) NOT NULL,
	`data_entrada` timestamp DEFAULT CURRENT_TIMESTAMP
)ENGINE=MyISAM CHARSET=utf8;

/*Estrutura da tabela notificações */
create table if not exists `notificacoes`(
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`data_entrada` timestamp DEFAULT CURRENT_TIMESTAMP
)ENGINE=MyISAM CHARSET=utf8;


/*Estrutura da tabela paises */
create table if not exists `paises`(
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`nome` VARCHAR(40) NOT NULL,
	`data_regist` date NOT NULL
)ENGINE=MyISAM CHARSET=utf8;

/*Estrutura da tabela provincias */
create table if not exists `provincias`(
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`nome` VARCHAR(40) NOT NULL,
	`pais_id` INT NOT NULL,
	`data_entrada` timestamp DEFAULT CURRENT_TIMESTAMP
)ENGINE=MyISAM CHARSET=utf8;

/*Estrutura da tabela imagens */
create table if not exists `imagens`(
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`nome_img` VARCHAR(40) NOT NULL,
	`caminho_img` VARCHAR(40) NOT NULL,
	`data_entrada` timestamp DEFAULT CURRENT_TIMESTAMP
)ENGINE=MyISAM CHARSET=utf8;