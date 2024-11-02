# JOTA Info - Sistema de Gestão de Notícias

Este é um sistema de gestão de notícias desenvolvido para o portal JOTA, utilizando Laravel e Inertia.js com Vue. A aplicação permite que administradores e editores criem, editem e gerenciem notícias, com controle de acesso para diferentes tipos de usuários.

## Requisitos

Para executar este projeto, você precisará ter as seguintes ferramentas instaladas:
- **PHP** >= 8.0
- **Composer** >= 2.x
- **MySQL** ou outro banco de dados compatível
- **Node.js** e **npm** (ou **Yarn**) para dependências de front-end
- **Git** para clonar o repositório

## Instruções de Instalação

### 1. Clone o Repositório

   ```bash
   git clone https://github.com/alynebrasil/jota-news.git
   cd jota-news
   ```

### 2. Instalação das Dependências do PHP
   Execute o seguinte comando para instalar as dependências do projeto usando o Composer:

   ```bash
   composer install
   ```

## 3. Configure o Banco de Dados

Crie um banco de dados no MySQL e nomeie-o como `laravel` (ou outro nome que preferir). Copie o arquivo `.env.example` para um novo arquivo `.env` e configure as credenciais do banco de dados:

```bash
cp .env.example .env
   ```

### 4. Gere a Chave da Aplicação

Execute o seguinte comando para gerar a chave da aplicação:

```bash
php artisan key:generate
   ```

### 5. Execute as Migrações e Seeders

Para criar as tabelas do banco de dados, execute as migrações e, opcionalmente, os seeders para popular o banco de dados com dados iniciais:

```bash
php artisan migrate --seed
   ```
#### Perfil de admin
Para criar o perfil de admin, será necessário alterar o banco de dados e adicioná-lo manualmente na tabela users
Para a senha, insira no terminal:

```bash
php artisan tinker
> Hash::make('12345678')
> exit
```
E copiar o código gerado para o campo na coluna senhas

### 6. Instale as Dependências de Front-end

Use o npm ou Yarn para instalar as dependências de front-end:

```bash
npm install
   ```

Ou, se preferir usar Yarn:

```bash
yarn install
   ```

### 7.Compile os Recursos de Front-end

Compile os recursos de front-end:

```bash
npm run dev
   ```

### Ou, para compilar para produção:

```bash
npm run build
   ```

### Inicie o Servidor de Desenvolvimento

Inicie o servidor de desenvolvimento Laravel:

```bash
php artisan serve
```

## Escolha de Ferramentas
Optei por utilizar as ferramentas com as quais me sinto mais confortável, como Laravel e Inertia.js com Vue.js, pois isso me permite desenvolver de forma ágil e integrar eficientemente o backend com o frontend. Estou sempre aberta a aprender novas tecnologias e tenho facilidade em me adaptar a diferentes ferramentas, garantindo que a aplicação tenha uma base sólida e escalável.