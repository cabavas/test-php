Desafio Técnico – Arquitetura de API para Entidade Polimórfica
Cenário do Desafio:
Este desafio foca em um problema comum de arquitetura de software: como gerenciar uma entidade base que pode se especializar em diferentes tipos, cada um com seus próprios atributos.
O objetivo é avaliar sua capacidade de projetar e estruturar uma solução de backend que seja limpa, escalável e que aplique as boas práticas de separação de responsabilidades que você mesma valoriza.
O Problema:
Considerando o esquema de banco de dados abaixo, que define uma tabela pessoas e suas especializações pessoas_fisicas e pessoas_juridicas:
Pergunta: Como você estruturaria para definir as rotas de criação para esses dois tipos de pessoa? Quais outros recursos de framework você utilizaria para garantir uma solução robusta, segura e de fácil manutenção?
Esquema do Banco de Dados de Referência:
SQL
-- Tabela Base
CREATE TABLE `pessoas` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pessoas_email_unique` (`email`)
);

-- Tabela de Especialização para Pessoa Física
CREATE TABLE `pessoas_fisicas` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pessoa_id` BIGINT UNSIGNED NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pessoas_fisicas_pessoa_id_unique` (`pessoa_id`),
  UNIQUE KEY `pessoas_fisicas_cpf_unique` (`cpf`),
  CONSTRAINT `fk_pessoas_fisicas_pessoa_id`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `pessoas` (`id`)
    ON DELETE CASCADE
);

-- Tabela de Especialização para Pessoa Jurídica
CREATE TABLE `pessoas_juridicas` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pessoa_id` BIGINT UNSIGNED NOT NULL,
  `cnpj` VARCHAR(18) NOT NULL,
  `razao_social` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pessoas_juridicas_pessoa_id_unique` (`pessoa_id`),
  UNIQUE KEY `pessoas_juridicas_cnpj_unique` (`cnpj`),
  CONSTRAINT `fk_pessoas_juridicas_pessoa_id`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `pessoas` (`id`)
    ON DELETE CASCADE
);
