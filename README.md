Um restaurante deseja desenvolver um sistema simples para organizar os pratos cadastrados por seus colaboradores. Atualmente, essas informações não possuem um controle centralizado, dificultando identificar quais pratos foram cadastrados e quem foi responsável por cada registro.

Sua equipe foi contratada para desenvolver uma primeira versão desse sistema utilizando PHP, MySQL, HTML e CSS, executando a aplicação localmente através do XAMPP.

Desafio

Desenvolva um sistema que permita o cadastro de usuários e o gerenciamento de pratos do restaurante.

Cada prato deverá estar relacionado ao usuário responsável pelo seu cadastro. Dessa forma, ao cadastrar um novo prato, o sistema deverá armazenar não apenas suas informações, mas também identificar qual usuário realizou o cadastro.

O banco de dados deverá possuir pelo menos duas tabelas relacionadas: uma para armazenar os usuários e outra para armazenar os pratos.

O sistema deverá permitir cadastrar usuários, cadastrar pratos, visualizar os pratos existentes, editar suas informações, excluir registros e identificar os pratos cadastrados por cada usuário.

Requisitos do Sistema

RF1 — Cadastrar Usuário: O sistema deve permitir cadastrar usuários informando nome e e-mail. - Lucas 

RF2 — Cadastrar Prato: O sistema deve permitir que um usuário cadastre um prato informando nome, descrição, preço e categoria. - Lucas 

* RF3 — Listar Pratos: O sistema deve apresentar todos os pratos cadastrados, informando também o usuário responsável pelo cadastro. - Carlos *

* RF4 — Editar Prato: O sistema deve permitir alterar as informações de um prato já cadastrado. - Carlos * 

* RF5 — Excluir Prato: O sistema deve permitir excluir um prato já cadastrado. - Carlos *   

 RF6 — Listar Pratos por Usuário: O sistema deve permitir visualizar os pratos cadastrados por um determinado usuário. 

 RNF1 — Validação dos Campos: O sistema não deve permitir o cadastro de usuários ou pratos com campos obrigatórios vazios.

RNF2 — Segurança dos Dados: As operações que recebem informações fornecidas pelo usuário deverão utilizar Prepared Statements.

Desenvolvimento

O projeto deverá ser desenvolvido utilizando o XAMPP como ambiente local. O Apache será responsável pela execução da aplicação PHP e o MySQL pelo armazenamento das informações.

A organização das páginas, formulários e arquivos PHP fica a critério da equipe. A interface não precisa ser complexa, mas deverá ser organizada e permitir que todas as funcionalidades sejam utilizadas com facilidade.

Durante o desenvolvimento, observe principalmente o relacionamento entre usuários e pratos. O sistema deverá conseguir identificar corretamente qual usuário cadastrou cada prato.

Utilize Prepared Statements nas operações de banco de dados que recebem valores externos, aplicando os conhecimentos pesquisados anteriormente sobre segurança e prevenção de SQL Injection.

Entrega

Em dupla, o projeto deverá ser versionado utilizando Git e GitHub. Realizem commits durante o desenvolvimento para registrar a evolução da aplicação.

Ao final, o repositório deverá conter o código-fonte completo, o script SQL necessário para criação do banco de dados e um README.md contendo as instruções básicas para executar o projeto utilizando XAMPP.

O sistema deverá estar funcional e permitir demonstrar o fluxo completo entre formulário, PHP e banco de dados, além do relacionamento entre usuários e os pratos cadastrados.