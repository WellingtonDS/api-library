## Iniciação do projeto

### Faça o clone do projeto

- git clone https://github.com/WellingtonDS/api-library.git

- Instale as dependências  do vendor com composer install para rodar o projeto

- copie o .env.example, cole na mesma raiz e renomeie para .env

- sera preciso criar a key no .env. vocÊ pode gerar com o comando php artisan key:generate

- Altera as configurações de banco de dado no .env de acordo com a porta do mysql em sua máquina, por padão ele utiliza a porta 3306, verifique se os parâmetros são os mesmo no diretório config/database.php no array mysql

- crie o container com docker compose up, para o projeto Laravel rodar no Docker.

- Crie a conexão de banco de dados com a ferramenta que se sentir confortável - Recomendação Debeahver

- Após conexão faça a migração das tabelas com o comando php artisan migrate. 

- Caso apresente erro utilize o comando para migrar as tabelas de forma individual  passando o nome da migration, por exemplo: 2023_06_01_194758_create_loans_table.php

Comando para migrar tabelas php artisan migrate:refresh --path=database/migrations/2023_06_01_194758_create_loans_table.php 

## Teste da aplicação
### Rotas de usuarios, livros e emprestimos, com botões na nav para facilitar navegação.

- localhost/users
- localhost/books
- localhost/loans


Ao criar novo usuário, livro ou empréstimo e apresentar o erro (SQLSTATE[HY000] [2002] Connection refused) após clicar no botão adicionar, Você pode mudar o host no .env e no config/database.php, colocando assim o ip do wifi que o computador estiver usando.

Exemplo no .env

# examplo para conectar banco om ip do wifi
# DB_CONNECTION=mysql
# DB_HOST=192.168.0.220
# DB_PORT=3306
# DB_DATABASE=api_library
# DB_USERNAME=root
# DB_PASSWORD=

### Para achar o Ip é só seguir o passo abaixo

- configurações-> Rede e internet -> wifi -> propriedades de "nome da rede", após isso você terá uma conexão estabilizada.

