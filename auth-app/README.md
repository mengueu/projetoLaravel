# 🚀 Projeto Laravel: Autenticação com Breeze & Sistema de Blog

Este repositório serve como um guia completo de estudos. Ele está dividido em duas partes: a **Parte 1** cobre a instalação e configuração inicial do ecossistema de autenticação com o Laravel Breeze, e a **Parte 2** detalha a construção de um Sistema de Blog com relacionamentos no banco de dados e operações CRUD protegidas.

---

# 🔒 Parte 1: Autenticação com Laravel Breeze

Esta seção contém o passo a passo detalhado para instalação, configuração e utilização do **Laravel Breeze**, um *starter kit* ideal para implementar sistemas de autenticação de forma simples, rápida e segura.

## ⚡ Resumo dos Comandos

```bash
# 1. Criar o projeto Laravel
composer create-project laravel/laravel auth-app

# 2. Entrar no diretório do projeto
cd auth-app

# 3. Abrir no VS Code (Opcional)
code .

# [Nota] Ajuste as configurações do banco de dados no arquivo .env antes de prosseguir

# 4. Instalar o pacote do Laravel Breeze via Composer
composer require laravel/breeze

# 5. Executar o instalador do Breeze (Escolha suas preferências no prompt)
php artisan breeze:install

# 6. Executar as migrations para criar as tabelas no banco de dados
php artisan migrate

# 7. Iniciar o servidor de desenvolvimento
php artisan serve
```

---

## 💡 O que é o Laravel Breeze?

O **Laravel Breeze** é um *starter kit* (kit inicial) que oferece uma implementação mínima e simples de todos os recursos de autenticação do Laravel. Ele foi criado para desenvolvedores que precisam de um ponto de partida sólido e seguro, sem a complexidade de ferramentas mais pesadas.

### 📦 O que ele entrega pronto?

Ao instalar o Breeze, você ganha automaticamente toda a estrutura essencial de autenticação:

* **Registro de Usuários:** Tela de cadastro com validação de dados pronta.
* **Login e Logout:** Sistema completo e seguro de entrada e saída de sessões.
* **Redefinição de Senha:** Fluxo completo para envio de e-mail de recuperação e troca de senha esquecida.
* **Verificação de E-mail:** Mecanismo integrado para garantir que o e-mail do usuário seja real.
* **Confirmação de Senha:** Camada extra de segurança para áreas sensíveis do sistema.
* **Perfil do Usuário:** Telas prontas para edição de dados cadastrais e exclusão de conta.

Tudo isso já vem totalmente estilizado com **Tailwind CSS** e é **100% responsivo**, adaptando-se perfeitamente a celulares, tablets e computadores.

No ambiente de desenvolvimento, o Breeze automatiza a criação de: **Rotas**, **Migrations**, **Models** (como o `User.php`), **Controllers** especialistas e **Views (Blade)** prontas.

---

## 🛠️ Instalação Passo a Passo

### Passo 1: Criar um novo projeto Laravel
Abra o seu terminal e execute o comando abaixo para iniciar um novo projeto do zero chamado `auth-app`:
```bash
composer create-project laravel/laravel auth-app
```

### Passo 2: Entrar na pasta do projeto
Navegue para dentro do diretório recém-criado:
```bash
cd auth-app
```

### Passo 3: Instalar o Laravel Breeze
Adicione o pacote do Breeze como dependência de desenvolvimento no seu projeto:
```bash
composer require laravel/breeze
```

### Passo 4: Executar o instalador do Artisan
Para que o Breeze configure toda a estrutura em seu projeto, execute:
```bash
php artisan breeze:install
```
*Durante a execução deste comando, o assistente perguntará qual stack você prefere (Blade, Livewire, React, Vue). Para este guia padrão, escolha **Blade**.*

**Este comando vai realizar as seguintes ações:**
1. Criar as views de autenticação (`resources/views/auth/...`)
2. Criar os controllers de autenticação (`app/Http/Controllers/Auth/...`)
3. Criar as migrations de banco de dados
4. Atualizar o arquivo de rotas
5. Criar arquivos de configuração frontend
6. Instalar e compilar as dependências de JavaScript/CSS automaticamente via Vite

### Passo 5: Configurar o arquivo `.env` e Executar as Migrations
Verifique se as configurações de conexão com o seu banco de dados estão corretas no arquivo `.env`. 

Em seguida, crie as tabelas executando:
```bash
php artisan migrate
```

### Passo 6: Iniciar o Servidor
Com tudo configurado, inicialize o servidor local do Laravel:
```bash
php artisan serve
```
O terminal informará o endereço local (geralmente `http://127.0.0.1:8000`) para você acessar a aplicação no navegador.

---

## 📂 Estrutura de Pastas Criadas pelo Breeze

Após a instalação completa, o ecossistema do seu projeto ganhará a seguinte estrutura de arquivos focados em autenticação:

```text
auth-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── Auth/
│   │   │       ├── AuthenticatedSessionController.php       # Gerencia o Login/Logout
│   │   │       ├── ConfirmablePasswordController.php        # Confirmação de senha
│   │   │       ├── EmailVerificationNotificationController.php
│   │   │       ├── EmailVerificationPromptController.php
│   │   │       ├── NewPasswordController.php
│   │   │       ├── PasswordController.php
│   │   │       ├── PasswordResetLinkController.php          # Links de recuperação
│   │   │       ├── RegisteredUserController.php             # Cadastro de usuário
│   │   │       └── VerifyEmailController.php
│   └── Models/
│       └── User.php                                         # Model de Usuário configurado
├── resources/
│   ├── views/
│   │   ├── auth/                                            # Telas do fluxo de autenticação
│   │   │   ├── confirm-password.blade.php
│   │   │   ├── forgot-password.blade.php
│   │   │   ├── login.blade.php
│   │   │   ├── register.blade.php
│   │   │   ├── reset-password.blade.php
│   │   │   └── verify-email.blade.php
│   │   ├── layouts/                                         # Layouts estruturais (Vite/Tailwind)
│   │   │   ├── app.blade.php                                # Layout para usuários logados
│   │   │   └── guest.blade.php                              # Layout para visitantes
│   │   └── dashboard.blade.php                              # Painel principal pós-login
├── routes/
│   ├── auth.php                                             # Novas rotas de autenticação (isoladas)
│   └── web.php                                              # Rota web principal integrada ao Breeze
├── database/
│   ├── migrations/
│   │   └── [data]_create_users_table.php                     # Estrutura da tabela de usuários
└── .env                                                     # Configurações de ambiente
```

---

## 🧪 Testando a Autenticação

Ao acessar `http://127.0.0.1:8000` no seu navegador, você notará novos botões no canto superior direito: **Log in** e **Register**.

### 📝 Testando o Registro
1. Clique no link **Register**.
2. Preencha o formulário com os seguintes dados:
   * **Name:** Seu nome completo.
   * **Email:** Um e-mail válido (ex: `seuemail@teste.com`).
   * **Password:** Uma senha segura com pelo menos 8 caracteres.
   * **Confirm Password:** Repita exatamente a mesma senha anterior.
3. Clique no botão **Register**. Se os dados forem válidos, você será redirecionado para o **Dashboard**.

### 🔑 Testando o Login
1. Se estiver logado, clique no seu nome no canto superior direito do Dashboard e selecione **Log Out**.
2. Na página inicial, clique em **Log in**.
3. Insira as credenciais do usuário que você acabou de criar (E-mail e Senha).
4. Clique em **Log in** para obter acesso imediato às rotas restritas, como o **Dashboard** e a página de edição do **Perfil do Usuário** (*Profile*).

<br>

---

# 📝 Parte 2: Sistema de Blog (Relacionamentos & CRUD)

Esta seção descreve o passo a passo completo para a construção de um Sistema de Blog utilizando a base criada anteriormente. O sistema implementa uma relação clássica entre **Categorias** e **Posts**.

## 📋 Regras de Negócio
* Existem Categorias (Exemplo: Tecnologia, Design, Marketing).
* Cada **Post** pertence a uma **Categoria**.
* Um post **não pode existir** sem uma categoria.

---

## 📁 Criando a Model Categoria

### Passo 1: Criar a Model
Execute o comando abaixo para gerar o modelo da categoria:
```bash
php artisan make:model Categoria
```
> **Resultado:** Cria o arquivo `app/Models/Categoria.php`.

### Passo 2: Criar a Migration
Gere o arquivo de migração para estruturar a tabela no banco de dados:
```bash
php artisan make_migration Categoria
```
> **Resultado:** Cria um arquivo em `database/migrations/` parecido com: `2026_05_19_xxxxxx_categoria.php`.

### Passo 3: Definir os Campos
Abra o arquivo da migration da categoria e configure a função `up()`:

```php
public function up(): void
{
    Schema::create('categorias', function (Blueprint $table) {
        $table->id();                    // ID único (chave primária)
        $table->string('name');          // Nome da categoria (texto)
        $table->timestamps();            // Colunas created_at e updated_at
    });
}
```

---

## 📰 Criando a Model Post

### Passo 1: Criar a Model
Execute o comando para gerar o modelo do Post:
```bash
php artisan make:model Post
```
> **Resultado:** Cria o arquivo `app/Models/Post.php`.

### Passo 2: Criar a Migration
Gere a migração responsável pela tabela de posts:
```bash
php artisan make:migration Post
```
> **Resultado:** Cria um arquivo em `database/migrations/` com o nome estruturado como `[data]_post.php`.

### Passo 3: Definir os Campos e Relacionamento
Abra o arquivo da migration do Post e configure a função `up()` definindo a chave estrangeira:

```php
public function up(): void
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();                                           // ID único
        $table->string('title');                                // Título do post
        $table->text('text');                                   // Conteúdo do post
        $table->foreignId('categorias_id')                      // Chave estrangeira
            ->constrained()                                     // Referencia a tabela categorias
            ->onDelete('cascade');                              // Deleta posts quando a categoria é deletada
        $table->timestamps();                                   // Colunas created_at e updated_at
    });
}
```

### 💡 Explicando a Chave Estrangeira
* **`foreignId('categorias_id')`**: Cria uma coluna de ID que servirá para referenciar outra tabela.
* **`constrained()`**: Faz o Laravel buscar automaticamente uma tabela chamada `categorias` contendo a coluna `id`.
* **`onDelete('cascade')`**: Garante a integridade referencial. Se uma categoria for deletada, todos os posts vinculados a ela serão removidos do banco automaticamente.

---

## ⚙️ Executando as Migrations

Para aplicar as configurações estruturais criadas e gerar as tabelas físicas dentro do seu banco de dados, execute:
```bash
php artisan migrate
```

---

## 🎮 Criando o Controller

### Passo 1: Criar o Controller Resource
Crie um controller contendo toda a estrutura de métodos CRUD já acoplada ao modelo de Categoria:
```bash
php artisan make:controller CategoriaController --resource --model=Categoria
```

### 🔍 O que as flags fazem?
* **`--resource`**: Cria automaticamente os métodos fundamentais para o ecossistema CRUD (`index`, `create`, `store`, `show`, `edit`, `update`, `destroy`).
* **`--model=Categoria`**: Realiza o Route Model Binding, vinculando diretamente o Model `Categoria` aos parâmetros dos métodos do controller.

---

## 🛣️ Configurando as Rotas

Abra o arquivo de rotas da aplicação em `routes/web.php` e adicione a rota do recurso protegida pelo grupo de autenticação (`auth`) fornecido pelo Breeze:

```php
use App\Http\Controllers\CategoriaController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Nova rota de recursos de categorias
    Route::resource('categorias', CategoriaController::class);
});
```

### 🔗 O que o `Route::resource()` gera por baixo dos panos?
Ele mapeia automaticamente todas as URLs necessárias para o CRUD:
* **GET** `/categorias` → `index`
* **GET** `/categorias/create` → `create`
* **POST** `/categorias` → `store`
* **GET** `/categorias/{categoria}` → `show`
* **GET** `/categorias/{categoria}/edit` → `edit`
* **PATCH/PUT** `/categorias/{categoria}` → `update`
* **DELETE** `/categorias/{categoria}` → `destroy`

---

## 📊 Implementando o Método Index e Listagem

### Passo 1: Configurar o Controller
No arquivo `app/Http/Controllers/CategoriaController.php`, implemente o método `index()`:

```php
public function index()
{
    $categorias = Categoria::all();
    return view('categorias.index', compact('categorias'));
}
```

### Passo 2: Criar a Estrutura de Views
1. Crie o diretório `resources/views/categorias/`.
2. Tire uma cópia do arquivo `resources/views/dashboard.blade.php`, cole dentro da pasta criada e altere o nome para `index.blade.php`.
   * **Caminho final:** `resources/views/categorias/index.blade.php`.

### Passo 3: Personalizar o Cabeçalho e Tabela de Listagem
Modifique o arquivo `resources/views/categorias/index.blade.php`. Substitua o bloco do cabeçalho `<x-slot name="header">`:

```blade
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>
```

Em seguida, localize a div de conteúdo principal `<div class="p-6 text-gray-900">` e insira a tabela estruturada para listar os dados:

```blade
    <div class="p-6 text-gray-900">
        <div class="mb-4">
            <a href="{{ route('categorias.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                Adicione uma nova categoria
            </a>
        </div>

        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($categorias as $categoria)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $categoria->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end gap-2">
                            <a href="{{ route('categorias.edit', $categoria) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
```

---

## ✏️ Implementando o Método Edit e Update

### Passo 1: Configurar a Edição no Controller
No seu `CategoriaController.php`, implemente o método `edit()`:

```php
public function edit(Categoria $categoria)
{
    return view('categorias.edit', compact('categoria'));
}
```

### Passo 2: Criar a View de Edição
Crie o arquivo `resources/views/categorias/edit.blade.php` copiando a estrutura base do `dashboard.blade.php`:

```blade
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Categoria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form method="POST" action="{{ route('categorias.update', $categoria) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                Nome:
                            </label>
                            <input type="text" name="name" id="name" value="{{ $categoria->name }}" 
                                   class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full px-3 py-2">
                        </div>

                        <div class="flex gap-2">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Salvar
                            </button>
                            <a href="{{ route('categorias.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
                                Cancelar
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```

#### 🛠️ Explicação dos elementos cruciais:
* **`@csrf`**: Token de segurança contra ataques CSRF (obrigatório em todos os formulários).
* **`@method('PUT')`**: Simula uma requisição do tipo `PUT` (pois formulários HTML nativos dão suporte apenas para `GET` e `POST`).
* **`value="{{ $categoria->name }}"`**: Preenche o campo com o valor atual guardado no banco.

### Passo 3: Implementando o Método Update
No `CategoriaController.php`, escreva as instruções do método `update()`:

```php
public function update(Request $request, Categoria $categoria)
{
    $categoria->update([
        'name' => $request->input('name'),
    ]);

    return redirect()->route('categorias.index');
}
```

### Passo 4: Configurar a Proteção Mass Assignment ($fillable)
Para evitar o erro de **MassAssignmentException**, defina quais campos podem ser preenchidos em massa.

Abra `app/Models/Categoria.php` e adicione:
```php
class Categoria extends Model
{
    protected $fillable = ['name'];
}
```

Abra `app/Models/Post.php` e adicione:
```php
class Post extends Model
{
    protected $fillable = ['title', 'text', 'categorias_id'];
}
```

---

## ➕ Implementando o Store (Criar Categoria)

### Passo 1: Configurar a Criação no Controller
No `CategoriaController.php`, defina o retorno no método `create()`:
```php
public function create()
{
    return view('categorias.create');
}
```

### Passo 2: Criar a View de Cadastro
Crie o arquivo `resources/views/categorias/create.blade.php`:

```blade
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Categoria') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('categorias.store') }}"> 
                        @csrf
                   
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full px-3 py-2"> 
                        </div>
                        
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```

### Passo 3: Implementar o Método Store no Controller
Escreva a lógica para persistir os novos registros no método `store()` do `CategoriaController.php`:

```php
public function store(Request $request)
{
    Categoria::create([
        'name' => $request->input('name'),
    ]);

    return redirect()->route('categorias.index');
}
```

---

## 🗑️ Implementando o Destroy (Deletar Categoria)

### Passo 1: Adicionar Botão de Exclusão na Listagem
Abra a sua view de listagem em `resources/views/categorias/index.blade.php` e insira o formulário de exclusão dentro do laço `@foreach`:

```blade
<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end gap-2">
    <a href="{{ route('categorias.edit', $categoria) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
    
    <form method="POST" action="{{ route('categorias.destroy', $categoria) }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar esta categoria? Todos os posts vinculados também serão apagados.')" class="text-red-600 hover:text-red-900 ml-2">
            Deletar
        </button>
    </form>
</td>
```

### Passo 2: Configurar a Exclusão no Controller
No seu `CategoriaController.php`, preencha o método `destroy()`:

```php
public function destroy(Categoria $categoria)
{
    $categoria->delete();
    return redirect()->route('categorias.index');
}
```
```