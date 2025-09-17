# 👨‍💻: CRUD de Funcionários com Autenticação

Aplicação web completa desenvolvida como parte do desafio para a vaga de programador. O sistema implementa um CRUD (Create, Read, Update, Delete) para gerenciar funcionários, protegido por uma camada de autenticação de usuário e totalmente containerizado com Docker.

## ✨ Funcionalidades

  * **Autenticação de Usuário:** Sistema completo de Registro e Login.
  * **Ambiente Containerizado:** Toda a aplicação (PHP, Nginx, MySQL, Node) roda em containers Docker, garantindo consistência e facilidade na configuração.
  * **CRUD de Funcionários:** Gerenciamento completo de funcionários (Criar, Ler, Atualizar, Excluir).
  * **Segurança de Dados:**
      * Senhas dos usuários são criptografadas (hashed).
      * CPF dos funcionários é criptografado no banco de dados.
  * **Interface Moderna:** Interface responsiva utilizando a template engine Blade com o framework Tailwind CSS.
  * **Setup Automatizado:** As migrações do banco de dados são executadas automaticamente na inicialização do container.

## 🛠️ Tecnologias Utilizadas

  * **Backend:** Laravel 10+ / PHP 8.1+
  * **Frontend:** Blade / Tailwind CSS / Vite
  * **Banco de Dados:** MySQL 8.0
  * **Containerização:** Docker & Docker Compose
  * **Servidor Web:** Nginx

## 📋 Pré-requisitos

Para rodar este projeto, você precisa ter apenas:

  * [Git](https://git-scm.com/)
  * [Docker](https://www.docker.com/products/docker-desktop/) e Docker Compose

> **Nota:** Você **não** precisa ter PHP, Composer ou Node.js instalados na sua máquina local. O Docker cuida de tudo\!

## 🚀 Instalação e Execução

Siga estes passos para ter a aplicação rodando em poucos minutos.

**1. Clone o Repositório**

```bash
git clone https://github.com/Zerfallener-Succellus/CRUD-de-Funcion-rios-com-Autentica-o-PHP
cd CRUD-de-Funcion-rios-com-Autentica-o-PHP
```

**2. Configure o Arquivo de Ambiente**
Copie o arquivo de exemplo. As configurações padrão já estão prontas para o ambiente Docker e não precisam de alteração.

```bash
cp .env.example .env
```

**3. Suba os Contêineres**
Este comando irá construir as imagens (na primeira vez) e iniciar todos os serviços em modo de desenvolvimento (com Vite Hot Reloading).

```bash
docker-compose --profile dev up -d --build
```

**4. Execute a Configuração Inicial ❗**
Com os contêineres rodando, execute os seguintes comandos para finalizar a configuração. **Estes passos são essenciais e só precisam ser feitos uma vez.**

  * **Gerar a Chave da Aplicação:**

    ```bash
    docker-compose exec app php artisan key:generate
    ```

  * **Corrigir Permissões das Pastas:**
    Este comando ajusta as permissões das pastas `storage` e `bootstrap/cache` para evitar erros de escrita de logs e sessões.

    ```bash
    docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
    ```

**5. Acesse a Aplicação**

🎉 **Pronto\!** A aplicação estará disponível no seu navegador em: **[http://localhost:8000](https://www.google.com/search?q=http://localhost:8000)**

-----

### Modo de Produção (Alternativo) 📦

Se desejar simular o ambiente de produção (sem o Vite), suba os contêineres com o comando abaixo e siga o **passo 4** de configuração normalmente.

```bash
docker-compose up -d --build
```

-----

## ⚙️ Comandos Úteis

Aqui estão alguns comandos úteis para gerenciar o ambiente.

  * **Parar o Ambiente:**
    Para parar todos os contêineres.

    ```bash
    docker-compose down
    ```

  * **Reset Completo do Banco de Dados:**
    Para parar os contêineres e remover o volume do banco de dados (todos os dados serão perdidos).

    ```bash
    docker-compose down -v
    ```

  * **Executar Comandos `artisan`:**
    Você pode executar qualquer comando do Laravel dentro do contêiner `app`.

    ```bash
    # Exemplo: Rodar migrations e seeders novamente
    docker-compose exec app php artisan migrate:fresh --seed

    # Exemplo: Ver as rotas da aplicação
    docker-compose exec app php artisan route:list
    ```

  * **Adicionar uma Nova Dependência com Composer:**

    ```bash
    docker-compose exec app composer require nome/pacote
    ```

  * **Acessar o Banco de Dados:**
    Você pode se conectar ao banco de dados usando seu cliente de SQL preferido com as credenciais do arquivo `.env` e a porta `3306`.

-----

*Desenvolvido por Lucas Ferreira*