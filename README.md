[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

## Controle de tarefas

<p>
Projeto de gerenciamento de __tarefas__ <br>
Implementando o login com o __Laravel UI__ envio de e-mails e a exportação de arquivos XLSX, CSV e PDF
</p>


## PHP Version

- 7.4

## Instação do laravel

```
composer create-project --prefer-dist laravel/laravel controle_tarefas "8.5.9"
```

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