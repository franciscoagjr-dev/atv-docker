# 🚀 Projeto do TCC - Ambiente Docker

Repositório estruturado para a atividade de implantação e orquestração de contêineres utilizando Docker, Docker Compose e PHP/MySQL.

## 🛠️ Tecnologias Utilizadas
- PHP 8.2 com Apache
- MySQL 8.0
- Docker & Docker Compose

## 🐳 Como executar o projeto com Docker

### Pré-requisitos
- [Docker Desktop](https://www.docker.com/products/docker-desktop/) instalado e em execução.
- Certifique-se de que serviços locais (como XAMPP ou Laragon) estejam parados para evitar conflito nas portas `8080` e `3306`.

### Passo a passo para rodar o ambiente:
1. Clone este repositório ou abra a pasta no seu computador.
2. Abra o terminal na raiz do projeto e execute o comando de construção e inicialização:
   ```bash
   docker compose up -d --build