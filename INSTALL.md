# Instruções para executar o projeto

# Utilizando Docker

## Pré-requisitos

- Docker >= 20.10.10
- Docker Compose >= 1.29.2
- Linux ou MacOS

## Passos

1. Devido a alguns [problemas de permissão](https://github.com/docker/compose/issues/5507#issuecomment-353890002) do Docker, o comando abaixo é necessário:

    Altere as permissões das pastas `public` e `src`:

    ```
    $ sudo chmod 777 public src
    ```

    > **OBS: Utilizar 777 em produção não é recomendável, neste caso foi utilizado para facilitar a configuração, devido à natureza didática do repositório.**

2. Copie o arquivo `src/env.sample.ini` para a mesma pasta e o renomeie para `env.ini`, após isso preencha-o com as informações de conexão com o banco de dados

3. Pelo terminal, acesse a pasta `docker` e execute o comando `docker-compose up -d`

4. Acesse o banco de dados e execute o dump contido no arquivo `extras/db.sql` para que o banco seja populado com usuários e outros dados necessários

5. Acesse o endereço do servidor (geralmente `http://127.0.0.1:8080` ou `http://localhost:8080`) por um browser e logue com algum usuário que conste no arquivo `extras/db.sql`

# Utilizando um servidor Apache (nativo, MAMP, LAMP, etc...)

## Pré-requisitos

- Servidor Apache >= 2.4.51
- Extensão do PHP (>= 8.0.12) para o servidor Apache
- Extensão `mod_rewrite` do Apache ativada
- MariaDB >= 10.6.5

## Passos

1. Copie o arquivo `src/env.sample.ini` para a mesma pasta e o renomeie para `env.ini`, após isso preencha-o com as informações de conexão com o banco de dados

2. Sirva a pasta `public`

3. Acesse o banco de dados e execute o dump contido no arquivo `extras/db.sql` para que o banco seja populado com usuários e outros dados necessários

4. Acesse o endereço do servidor (geralmente `http://127.0.0.1:8080` ou `http://localhost:8080`) por um browser e logue com algum usuário que conste no arquivo `extras/db.sql`
