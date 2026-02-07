### 🧩 RF002 — Cadastro de Seguidores
    - Branch: RF002.1

| Código    | Nome                       | Descrição                                                                                               | Prioridade |         Status        | Critérios de Aceitação                                              |
| :-------- | :------------------------- | :------------------------------------------------------------------------------------------------------ | :--------: | :-------------------: | :------------------------------------------------------------------ |
| **RF002** | **Cadastro de Seguidores** | O seguidor deve poder realizar um cadastro simples para seguir canais, comentar e receber notificações. |   🔺 Alta  | 🟡 Em desenvolvimento | O usuário consegue criar uma conta, validar e acessar a plataforma. |

🔹 Sub-Requisitos Funcionais

| Código      | Nome                                           | Descrição                                                                                                                            | Prioridade |         Status        | Critérios de Aceitação                                                                            |
| :---------- |:-----------------------------------------------|:-------------------------------------------------------------------------------------------------------------------------------------| :--------: | :-------------------: | :------------------------------------------------------------------------------------------------ |
| **RF002.1** | **Formulário hibrido - login/cad**             | Deve existir um formulário com e-mail e senha e de cadastro de follower (seguidor). O e-mail deve ser único e a senha criptografada. |   🔺 Alta  |      🟢 Concluído     | Campos obrigatórios validados, erro amigável exibido e redirecionamento para tela de confirmação. |
| **RF002.2** | **Validação de E-mail (Token de Confirmação)** | Após o cadastro, o sistema envia um e-mail com token de confirmação para ativar a conta.                                             |   🔺 Alta  | 🟡 Em desenvolvimento | Token expira em 24h; link confirma conta; login bloqueado antes da confirmação.                   |
| **RF002.3** | **Login e Sessão de Seguidor**                 | O seguidor faz login com e-mail/senha após confirmação de e-mail.                                                                    |  🟠 Média  |      🔴 Pendente      | Somente usuários confirmados podem acessar; sessão expira em 2h.                                  |
| **RF002.4** | **Seguir Canais**                              | O seguidor autenticado pode seguir e deixar de seguir canais.                                                                        |  🟢 Média  |      🔴 Pendente      | Botão alterna “Seguir/Seguindo”; relação persistida (`followers`).                                |
| **RF002.5** | **Notificações**                               | Seguidores podem receber notificações de novos posts/campanhas dos canais que seguem.                                                |  🟡 Média  |      🔴 Pendente      | Seguidor pode ativar/desativar notificações; e-mails enviados automaticamente.                    |


# Estratégia Técnica de Implementação (RF002)

### RF002.1 — Formulário de Cadastro Inscrito
- Ação: Instalar o Laravel Breeze (versão Blade ou Livewire).
- Técnica: O Breeze já traz a validação de unique:users,email e o Hash::make para a senha.
- Personalização: Alterar a RegisterUserController para injetar o type => 'follower' automaticamente no momento da criação do usuário.
- **`Login`**: O inscrito loga pelas telas do Breeze. Se um Admin tentar logar, o redirecionamento leva a area admin (filament):
    - **`APP`** -> redireciona para **`home`**.
    - **`ADMIN/SUPER_ADMIN`** -> redireciona para **`/admin`**.

###### Rotas (routes/web.php) Rotas de Autenticação (Breeze instalará estas)
- Divida seu arquivo de rotas em grupos claros:

```
    // Grupo 1: Público (Qualquer um vê)
    Route::get('/', [LandingController::class, 'index']);
    Route::get('/canal/{slug}', [ChannelController::class, 'show']);
    
    // Isso define as rotas: login, register, logout, password.request, etc.
    require __DIR__.'/auth.php';
    
    // Grupo 3: Interação do Seguidor (Logado e Verificado)
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::post('/follow/{channel}', [FollowController::class, 'store']);
        Route::post('/comment', [CommentController::class, 'store']);
        Route::post('/follow/{channel}', [ChannelController::class, 'toggleFollow'])->name('channel.follow');
        // Futuros comentários ou interações...
    });
```

### RF002.2 — Validação de E-mail (Documentação: https://laravel.com/docs/12.x/verification)
- Ação: Implementar a interface **`MustVerifyEmail.`** no Model User.
- Técnica: Habilitar o middleware ['auth', 'verified'] nas rotas protegidas.
- Configuração: No .env, configurar o Mailtrap para capturar os e-mails de teste e verificar o layout da mensagem em AuthServiceProvider.
- O Laravel já traz toda a lógica de tokens e expiração pronta. Você só precisa implementar a interface no seu Model **User** e proteger as rotas com o middleware **verified**. Isso economiza dias de trabalho e é mais seguro.

## ANALISAR
- Se logou mesmo NÃO VERIFICADO
- ajustar mensagens de erro no login, cadastro


### RF002.3 — Login e Sessão de Seguidor
- Ação: Configurar o middleware de redirecionamento.
- Técnica: No arquivo config/session.php, ajustar o lifetime para 120 (2 horas) conforme o critério de aceitação.
- Segurança: Garantir que o método authenticated() no LoginController redirecione o seguidor para a Home e o Criador para o /admin.

### RF002.4 — Seguir Canais
- Ação: Criar migration para a tabela pivô channel_follower (campos: user_id, channel_id).
- Técnica: Utilizar o método toggle() do Eloquent.
- $user->following()->toggle($channelId); (Isso liga/desliga o "Seguir" automaticamente).
- Interface: Criar um componente Livewire para o botão "Seguir", permitindo que o estado mude sem recarregar a página.
- Utilize a tabela `users`: Use um campo type (string ou enum) na tabela users (ex: 'admin', 'creator', 'follower').
- Para implementar o ato de seguir, você precisará de uma tabela pivô chamada channel_follower. (Tipo de Relação: Muitos-para-Muitos (BelongsToMany).)
- Implementação: Adicionar uma coluna type ou role via Migration.
- **_Sugestão_**: Use constantes ou um Enum no PHP para evitar erros de digitação (ex: User::TYPE_CREATOR, User::TYPE_FOLLOWER).



### RF002.5 — Notificações
- Ação: Criar classe de notificação via CLI: php artisan make:notification NewCampaignPublished.
- Técnica: Implementar os canais mail e database.
- Fila: Adicionar a interface ShouldQueue na classe da Notificação para que o envio seja assíncrono (não trave o site).

- O Laravel tem um sistema chamado Laravel Notifications.
- Ele permite que você envie o mesmo alerta por E-mail, Banco de Dados (sininho no site) ou até WhatsApp/SMS no futuro, usando a mesma classe. É muito modular e "limpo"
- **Ferramenta: Laravel Notifications.**

###### 📬Gestão de E-mails e Filas (Jobs/Queues)
- Como você está usando XAMPP (Windows), o envio de e-mail pode travar o navegador por alguns segundos se for feito de forma síncrona.
- Dica: Comece configurando o MAIL_MAILER=log no seu arquivo .env. Assim, os e-mails não são enviados de verdade, mas aparecem nos logs do Laravel. Quando estiver pronto para testar visualmente, use o Mailtrap (é gratuito e excelente para iniciantes).
- Para as Queues: Use o driver database. É o mais fácil de configurar para quem está começando. Você só precisará rodar um comando no terminal (php artisan queue:work) para "processar" os e-mails pendentes.


### Proteção de Rotas com Middlewares
- Utilize os grupos de rotas no seu routes/web.php para separar os ambientes:
- Rotas Públicas: Landing page, página do canal (slug).
- Rotas do Seguidor: Protegidas por auth e verified.
- Rotas do Admin: Protegidas pelo middleware nativo do Filament.

# Como implementar isso sem bagunça? (Passo a Passo)

### Fase 1: Preparação da Estrutura (Backend)
- Atualização do Model User:
- Adicionar a coluna panel_type (Enum: super-admin, admin, app).
- Definir o valor padrão como app.
- Criação da Tabela de Relacionamento:
- Migration create_channel_follower_table (Pivô).
- Implementar métodos following() e followers() nos Models.

### Fase 2: Autenticação e Verificação (Breeze)
- Instalação Segura:
- Instalar o Breeze (Blade Stack).
- Personalizar o RegisterController para que todo novo usuário receba o panel_type => app.
- Fluxo de Segurança:
- Ativar MustVerifyEmail no Model User.
- Configurar o Middleware de redirecionamento: Se o usuário logado for app, ele não pode digitar /admin na URL (redirecionar para home).

```
    # 1. Instala o pacote do Breeze
    composer require laravel/breeze --dev
    
    # 2. Instala a stack Blade (que combina com seu projeto)
    # Escolha "Blade" quando perguntado
    php artisan breeze:install blade
    
    # 3. Sincroniza o banco de dados (Breeze cria tabelas de reset de senha)
    php artisan migrate
    
    # 4. Compila os assets (CSS/JS) para o novo login
    npm install && npm run dev
```

##### 1. Recuperando suas Rotas (web.php)
   - O Breeze limpou seu arquivo para colocar a rota /dashboard dele. Como você tem o Git, você não perdeu nada.

**_O que fazer:_**

- Abra o terminal e use este comando para ver o que mudou: git diff routes/web.php.

- Para restaurar seu arquivo original e apenas adicionar o que o Breeze precisa, você pode usar:

- git checkout routes/web.php (Isso volta o arquivo ao estado antes da instalação).


```
    // Agora, abra o routes/web.php manualmente e adicione apenas esta linha no final do arquivo:
    require __DIR__.'/auth.php';
```

### Fase 3: Funcionalidades Sociais (Interação)
- Lógica do Follow:
- Criar uma rota POST /follow/{channel}.
- Usar a função $user->following()->toggle($channel).
- Sistema de Notificações:
- Criar a Notificação NewCampaignPublished.
- Configurar a fila (database) no .env.

### Fase 4: Frontend e Feedback
- Páginas de Autenticação:
- Customizar as cores das telas do Breeze para combinarem com a sua landing.blade.php.
- Dashboard do Usuário:
- Criar uma visão simples onde o usuário vê quem ele segue.



⚙️ Requisitos Não Funcionais (RNF)

| Código       | Nome           | Descrição                                                                   |     Categoria     |      Status      |
| :----------- | :------------- | :-------------------------------------------------------------------------- | :---------------: | :--------------: |
| **RNF002.1** | Segurança      | Senhas, tokens e e-mails devem ser criptografados e tratados com segurança. |    🔐 Segurança   |     🟢 Ativo     |
| **RNF002.2** | Performance    | O envio de e-mail de confirmação deve ocorrer em menos de 5 segundos.       |    ⚡ Desempenho   | 🟡 Monitoramento |
| **RNF002.3** | Usabilidade    | Interface com feedback visual, mensagens claras e responsividade.           |      🎨 UX/UI     |     🟢 Ativo     |
| **RNF002.4** | Escalabilidade | Sistema deve suportar 10.000 seguidores simultâneos sem degradação.         | ☁️ Infraestrutura |   🔴 Planejado   |


# desenvolvido RF002:

- Install Breeze e ajuste de layout e rotas

```
    # 1. Instala o pacote do Breeze
    composer require laravel/breeze --dev
    
    # 2. Instala a stack Blade (que combina com seu projeto)
    # Escolha "Blade" quando perguntado
    php artisan breeze:install blade
    
    # 3. Sincroniza o banco de dados (Breeze cria tabelas de reset de senha)
    php artisan migrate
    
    # 4. Compila os assets (CSS/JS) para o novo login
    npm install && npm run dev
    
```

- **`ajuste`** | Configurar o Cadastro de Seguidor (RF002.1)
  - `app/Http/Controllers/Auth/RegisteredUserController.php`

- **`ajuste`** | Configurar o Cadastro de Seguidor (RF002.1)
    - `app/Http/Controllers/Auth/AuthenticatedSessionController.php`

- Ajuste no Models
  - USER `**following(): BelongsToMany**`
  - CHANNEL **`followers(): BelongsToMany`**

- Cadastros de seguidores e posteriormente todos
  - `app/Http/Controllers/Auth/RegisteredUserController.php`

- Organizando rotas no web.php

- A Tabela de Seguidores (Migration)
  - **`php artisan make:migration create_channel_follower_table** `

- O Componente Livewire (O Botão "Seguir")
    - **`php artisan make:livewire FollowButton`**

- UX de alto nível: O usuário não perde o que está assistindo/lendo para seguir.
- Código Limpo: A lógica de "seguir" está isolada em um componente só dela.
- Escalabilidade: Você pode usar esse mesmo botão em qualquer lugar do site (lista de canais, posts, etc).

- desativamos o login do Filament?
    - `app/Providers/Filament/AdminPanelProvider.php` | **Basta comentar ou remover a linha ->login()**
o Filament vai perceber que ele é um "visitante", vai ver que o login do painel está desativado e vai redirecionar ele automaticamente para o /login do Breeze.

# **passo que você gostaria de dar?**

- [🟡] **Criar uma seção "Canais que eu sigo" na Home do usuário.**
- [🟡] Começar a planejar a RF003 (aquela da API que você mencionou antes).
- [🟢] Estilizar as páginas de Login/Registro do Breeze com o seu CSS Dark/Retro.
- [🟡] Ajustar o getTabs da ListUser
- [🟡] Ver niveis dos usuário e mudar nomes PanelType (MUDAR: ADMIN = Streamer cor verde | APP = Seguidor cor laranja|)
- [🟡] Listagem de seguidores em separado
- [🟡] seguidor o form é simples e edit simples e deleção e somente super-admin visualiza lista
- [  ] Perfil master user logado ADMIN/FILAMENT
- [  ] Perfil seguidor web
