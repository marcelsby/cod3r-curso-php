# Instruções para executar o projeto

# Utilizando Docker

## Pré-requisitos

- Docker >= 20.10.10
- Docker Compose >= 1.29.2
- Linux ou MacOS

## Passos

1. Devido a alguns [problemas de permissão](https://github.com/docker/compose/issues/5507#issuecomment-353890002) do Docker, os comandos abaixo são necessários:

    2.1. Crie um grupo com o ID 33:

    ```
    $ sudo groupadd -g 33 www-data
    ```

    2.2. Adicione seu usuário a este grupo:

    ```
    $ sudo usermod -aG 33 $USER
    ```

    2.3. Na pasta raiz do repositório troque as permissões e titularidade da pasta `src` com o seguinte comando:

    ```
    $ sudo chown 33:33 src && sudo chmod 775 src
    ```

    2.4. Reinicie seu dispositivo

2. Execute o comando `docker-compose up -d` utilizando o arquivo `src/docker-compose.yml` como argumento

3. Acesse o endereço do servidor por um browser e logue com algum usuário que esteja cadastrado no arquivo `src/login.php`

___

# Utilizando um servidor Apache (nativo, MAMP, LAMP, etc...)

## Pré-requisitos

- Servidor Apache >= 2.4.51
- Extensão do PHP (>= 8.0.12) para o servidor Apache

## Passos

1. Sirva a pasta `src`
2. Acesse o endereço do servidor por um browser e logue com algum usuário que esteja cadastrado no arquivo `src/login.php`
