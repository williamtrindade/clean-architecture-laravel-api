# Projeto Laravel com Docker

Este é um boilerplate para aplicações Laravel que utiliza Docker para gerenciar ambientes de desenvolvimento e produção. A arquitetura é composta por contêineres separados para a aplicação, o servidor web e o banco de dados.

## Stack de Tecnologia

- **Framework:** Laravel
- **Servidor Web:** Nginx
- **Servidor de Aplicação:** PHP 8.2 FPM
- **Banco de Dados:** PostgreSQL 13
- **Gerenciamento de Ambiente:** Docker e Docker Compose

## Pré-requisitos

Certifique-se de que os seguintes softwares estão instalados na sua máquina:

- [**Docker**](https://docs.docker.com/get-docker/)
- [**Docker Compose**](https://docs.docker.com/compose/install/)

## Primeiros Passos

Siga os passos abaixo para configurar e executar o projeto localmente.

### 1. Clonar o Repositório

Clone o repositório do projeto e navegue até o diretório:

```bash
git clone https://github.com/SEU_USUARIO/SEU_PROJETO.git
cd SEU_PROJETO
```

### 2. Configurar o Ambiente

Copie o arquivo de exemplo `.env.example` para `.env` e ajuste as configurações conforme necessário (como credenciais do banco de dados):

```bash
cp .env.example .env
```

### 3. Construir e Iniciar os Contêineres

Use o Docker Compose para construir e iniciar os contêineres:

```bash
docker-compose up -d --build
```

### 4. Instalar Dependências do Laravel

Acesse o contêiner da aplicação PHP e instale as dependências do Composer:

```bash
docker-compose exec app composer install
```

### 5. Gerar a Chave da Aplicação

Gere a chave de aplicação do Laravel:

```bash
docker-compose exec app php artisan key:generate
```

### 6. Executar as Migrações do Banco de Dados

Execute as migrações para configurar o banco de dados:

```bash
docker-compose exec app php artisan migrate
```

### 7. Acessar a Aplicação

A aplicação estará disponível em `http://localhost:8000` (ou a porta configurada no `docker-compose.yml`).

### 8. Parar os Contêineres

Para parar os contêineres sem removê-los:

```bash
docker-compose stop
```

Para parar e remover os contêineres, redes e volumes:

```bash
docker-compose down
```

## Estrutura do Projeto

- `app/`: Código-fonte da aplicação Laravel.
- `docker/`: Arquivos de configuração do Docker (Dockerfile, configurações do Nginx, etc.).
- `docker-compose.yml`: Configuração do Docker Compose para orquestração dos contêineres.

## Comandos Úteis

- Acessar o contêiner da aplicação:
  ```bash
  docker-compose exec app bash
  ```
- Visualizar logs dos contêineres:
  ```bash
  docker-compose logs
  ```
- Limpar o cache da aplicação:
  ```bash
  docker-compose exec app php artisan cache:clear
  ```
