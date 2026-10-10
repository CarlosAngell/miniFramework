
---

# 📌 Descrição de Cada Diretório

## 📂 **public/**
Ponto de entrada da aplicação.  
Tudo que o navegador acessa diretamente fica aqui.

- `index.php` → inicializa rotas, carrega autoload e inicia o router.

---

## 📂 **src/**
Contém todo o código-fonte da aplicação.

### ▶ Controllers/
Camada responsável por receber requisições e retornar respostas.

Ex.: `UserController.php`

- Não contém regras de negócio
- Chama Services
- Retorna views ou JSON

---

### ▶ Models/
Representam entidades e tabelas do banco.

Ex.: `User.php`

- Herda de BaseModel
- Define `$table` e `$fillable`
- Responsável por consultas ao banco

---

### ▶ Services/
Onde ficam as regras de negócio.

Ex.: `UserService.php`

- Validações
- Fluxos complexos
- Regras da aplicação
- Processamento de dados

Mantém o controller mais limpo.

---

### ▶ Core/
O “mini framework” criado dentro do projeto.

Contém:

- `Router.php` → gerencia rotas  
- `Controller.php` → classe base dos controllers  
- `Request.php` → encapsula dados da requisição  
- `Response.php` → padroniza retorno HTTP  
- `Database.php` → gerencia conexão com PDO  

---

### ▶ Helpers/
Funções auxiliares globais, como:

- `view()`
- `dd()`
- `redirect()`
- Helpers de string, datas, arrays etc.

---

# 📂 **views/**
Arquivos HTML que são renderizados pela aplicação.

### ▶ layout/
Templates reutilizáveis:
- `header.php`
- `footer.php`

### ▶ auth/
Páginas relacionadas a login e registro.

### ▶ users/
Views específicas para CRUD de usuários:
- `index.php`
- `create.php`
- `edit.php`

---

# 📂 **routes/**
Arquivo central de rotas HTTP.

Exemplo (`web.php`):

```php
$router->get('/users', 'UserController@index');
$router->post('/users', 'UserController@store');