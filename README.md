[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat)](https://github.com/phpstan/phpstan)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## Controle de tarefas

Projeto de **gerenciamento de tarefas**  
Implementando o login com o **Laravel UI** envio de **E-mails** e a exportação de arquivos **XLSX**, **CSV** e **PDF**

# Requisitos

- PHP 7.4 ou superior.  
Check the [Download PHP](https://www.php.net/downloads.php)

### GitHub

1. Clone o repositório **Controle de tarefas** de [https://github.com/AndreCamargoo/controle-tarefas.git]() para uma pasta na webroot do seu servidor, por exemplo. `~/webroot/andre-camargo`. Launch a **terminal** or **console** and navigate to the webroot folder:
   ```
   $ cd ~/webroot
   $ git clone https://github.com/AndreCamargoo/controle-tarefas.git

2. Após clonar o repositorio, configure o arquivo .env  
> DB_CONNECTION=mysql
> DB_HOST=127.0.0.1
> DB_PORT=3306
> DB_DATABASE=laravel
> DB_USERNAME=root
> DB_PASSWORD=  

> MAIL_MAILER=smtp
> MAIL_HOST=mailhog
> MAIL_PORT=1025
> MAIL_USERNAME=null
> MAIL_PASSWORD=null
> MAIL_ENCRYPTION=null
> MAIL_FROM_ADDRESS=null
> MAIL_FROM_NAME="${APP_NAME}"

### Requisitos

- [x] Deve ser possível fazer um novo cadastro
- [x] Deve ser possível recuperar a senha
- [x] Deve ser possível cadastrar uma nova tarefas
- [x] Deve ser possível listar tarefas
- [x] Deve ser possível editar as tarefas
- [x] Deve ser possível deletar as tarefas

---

## Regras de negócio

- [x] Enviar e-mail para confirmação de cadastro
- [x] Enviar e-mail com recuperação de senha
- [x] Usuário deve estar autenticado para cadastrar, editar ou deletar uma tarefa
- [x] Gerar um arquivo de download XLSX
- [x] Gerar um arquivo de download CSV
- [x] Gerar um arquivo de donwload PDF