Com certeza\!

Agora que o projeto está totalmente dockerizado e automatizado, o `README.md` fica muito mais limpo e profissional. As instruções de instalação e execução são drasticamente simplificadas, o que é um grande benefício da nossa nova estrutura.

Aqui está a versão final e atualizada do `README.md` que reflete o estado atual do seu projeto.

-----

# 👨‍💻 Desafio: CRUD de Funcionários com Autenticação

Aplicação web completa desenvolvida como parte do desafio para a vaga de programador. O sistema implementa um CRUD (Create, Read, Update, Delete) para gerenciar funcionários, protegido por uma camada de autenticação de usuário e totalmente containerizado com Docker.

## 🖼️ Telas da Aplicação

\<p align="center"\>
\<em\>(Substitua os links abaixo pelas URLs das suas screenshots)\</em\>
\</p\>
\<br\>
\<p align="center"\>
\<img src="[https://via.placeholder.com/400x250/6366f1/ffffff?text=Tela+de+Login](https://www.google.com/search?q=https://via.placeholder.com/400x250/6366f1/ffffff%3Ftext%3DTela%2Bde%2BLogin)" width="45%" alt="Tela de Login"\>
\&nbsp; \&nbsp; \&nbsp;
\<img src="[https://via.placeholder.com/400x250/10b981/ffffff?text=Listagem+de+Funcionários](https://www.google.com/search?q=https://via.placeholder.com/400x250/10b981/ffffff%3Ftext%3DListagem%2Bde%2BFuncion%C3%A1rios)" width="45%" alt="Listagem de Funcionários"\>
\</p\>
\<p align="center"\>
\<img src="[https://via.placeholder.com/400x250/f59e0b/ffffff?text=Formulário+de+Cadastro](https://www.google.com/search?q=https://via.placeholder.com/400x250/f59e0b/ffffff%3Ftext%3DFormul%C3%A1rio%2Bde%2BCadastro)" width="45%" alt="Formulário de Cadastro/Edição"\>
\</p\>

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

O processo para rodar a aplicação é extremamente simples graças ao Docker.

**1. Clone o Repositório**

```bash
git clone https://github.com/Zerfallener-Succellus/CRUD-de-Funcion-rios-com-Autentica-o-PHP
cd nome-do-projeto
```

**2. Configure o Arquivo de Ambiente**
Copie o arquivo de exemplo. As configurações padrão já estão prontas para o ambiente Docker.

```bash
cp .env.example .env
```

**3. Escolha o Modo de Execução**

Você pode iniciar a aplicação em dois modos:

### Modo de Desenvolvimento 👩‍💻

(Com atualização automática do front-end - Hot Reloading)

Execute o seguinte comando para construir as imagens e iniciar todos os containers, incluindo o serviço do Vite para desenvolvimento:

```bash
docker-compose --profile dev up -d --build
```

  * **Na primeira vez que rodar,** gere a chave da aplicação:
    ```bash
    docker-compose exec app php artisan key:generate
    ```

### Modo de Produção 📦

(Simula o ambiente final com os arquivos de front-end compilados e otimizados)

Execute este comando para construir a imagem final e iniciar os containers essenciais (sem o Vite Hot Reloading):

```bash
docker-compose up -d --build
```

  * **Na primeira vez que rodar,** gere a chave da aplicação:
    ```bash
    docker-compose exec app php artisan key:generate
    ```

**4. Acesse a Aplicação**

🎉 **Pronto\!** A aplicação estará disponível no seu navegador em: **[http://localhost:8000](https://www.google.com/search?q=http://localhost:8000)**

## ⚙️ Comandos Úteis do Docker

Aqui estão alguns comandos úteis para gerenciar o ambiente Docker.

  * **Parar todos os containers:**

    ```bash
    docker-compose down
    ```

  * **Parar e remover os volumes do banco (para um reset completo):**

    ```bash
    docker-compose down -v
    ```

  * **Executar comandos `artisan` dentro do container:**

    ```bash
    # Exemplo: Rodar migrations e seeders novamente
    docker-compose exec app php artisan migrate:fresh --seed

    # Exemplo: Ver as rotas da aplicação
    docker-compose exec app php artisan route:list
    ```

  * **Executar o Composer:**

    ```bash
    docker-compose exec app composer install
    ```

-----

*Desenvolvido por Lucas Ferreira*