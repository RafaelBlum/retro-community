# metodologias ágeis

## US002 — Cadastro de Seguidores

**Como** seguidor  
**Quero** me cadastrar na plataforma  
**Para** poder seguir canais e comentar publicações

### Critérios de Aceitação
- [x] O formulário deve validar e-mail e senha.
- [x] Enviar e-mail de confirmação com token.
- [x] Bloquear login até ativação.  



Veja como ficaria:

💡 Observações de Implementação (para o desenvolvedor)

Criar Model Follower ou utilizar User com papel follower.

Implementar verificação por Laravel Breeze ou Laravel Fortify.

Configurar Mailtrap, Postmark ou Resend em ambiente de testes.

Usar Jobs e Queues para envio de e-mail assíncrono.

Testes: Feature Test (Cadastro, Login, Confirmação de E-mail) e Unit Test (Token, Expiração).

ID	Funcionalidade	Descrição
✅ RF002	Cadastro de Seguidores	O seguidor deve poder realizar um cadastro simples para seguir canais, comentar e receber notificações.
└── RF002.1	Formulário de Cadastro	O sistema deve disponibilizar um formulário com campos essenciais (nome, e-mail, senha) para cadastro do seguidor.
└── RF002.2	Validação de E-mail	Após o cadastro, o sistema deve enviar um e-mail com link de verificação (token) para confirmação da conta.
└── RF002.3	Ativação de Conta	A conta do seguidor deve ser ativada apenas após a validação do token enviado por e-mail.
└── RF002.4	Notificação de Boas-Vindas	Após a validação, o sistema deve enviar uma mensagem de boas-vindas confirmando o registro e orientações iniciais.
└── RF002.5	Associação a Canal	O seguidor deve poder seguir canais específicos após o cadastro, vinculando sua conta ao canal escolhido.


🧩 RF002 — Cadastro de Seguidores

| Código    | Nome                       | Descrição                                                                                               | Prioridade |         Status        | Critérios de Aceitação                                              |
| :-------- | :------------------------- | :------------------------------------------------------------------------------------------------------ | :--------: | :-------------------: | :------------------------------------------------------------------ |
| **RF002** | **Cadastro de Seguidores** | O seguidor deve poder realizar um cadastro simples para seguir canais, comentar e receber notificações. |   🔺 Alta  | 🟡 Em desenvolvimento | O usuário consegue criar uma conta, validar e acessar a plataforma. |

🔹 Sub-Requisitos Funcionais

| Código      | Nome                                           | Descrição                                                                                             | Prioridade |         Status        | Critérios de Aceitação                                                                            |
| :---------- | :--------------------------------------------- | :---------------------------------------------------------------------------------------------------- | :--------: | :-------------------: | :------------------------------------------------------------------------------------------------ |
| **RF002.1** | **Formulário de Cadastro**                     | Deve existir um formulário com nome, e-mail e senha. O e-mail deve ser único e a senha criptografada. |   🔺 Alta  |      🟢 Concluído     | Campos obrigatórios validados, erro amigável exibido e redirecionamento para tela de confirmação. |
| **RF002.2** | **Validação de E-mail (Token de Confirmação)** | Após o cadastro, o sistema envia um e-mail com token de confirmação para ativar a conta.              |   🔺 Alta  | 🟡 Em desenvolvimento | Token expira em 24h; link confirma conta; login bloqueado antes da confirmação.                   |
| **RF002.3** | **Login e Sessão de Seguidor**                 | O seguidor faz login com e-mail/senha após confirmação de e-mail.                                     |  🟠 Média  |      🔴 Pendente      | Somente usuários confirmados podem acessar; sessão expira em 2h.                                  |
| **RF002.4** | **Seguir Canais**                              | O seguidor autenticado pode seguir e deixar de seguir canais.                                         |  🟢 Média  |      🔴 Pendente      | Botão alterna “Seguir/Seguindo”; relação persistida (`followers`).                                |
| **RF002.5** | **Notificações**                               | Seguidores podem receber notificações de novos posts/campanhas dos canais que seguem.                 |  🟡 Média  |      🔴 Pendente      | Seguidor pode ativar/desativar notificações; e-mails enviados automaticamente.                    |

⚙️ Requisitos Não Funcionais (RNF)

| Código       | Nome           | Descrição                                                                   |     Categoria     |      Status      |
| :----------- | :------------- | :-------------------------------------------------------------------------- | :---------------: | :--------------: |
| **RNF002.1** | Segurança      | Senhas, tokens e e-mails devem ser criptografados e tratados com segurança. |    🔐 Segurança   |     🟢 Ativo     |
| **RNF002.2** | Performance    | O envio de e-mail de confirmação deve ocorrer em menos de 5 segundos.       |    ⚡ Desempenho   | 🟡 Monitoramento |
| **RNF002.3** | Usabilidade    | Interface com feedback visual, mensagens claras e responsividade.           |      🎨 UX/UI     |     🟢 Ativo     |
| **RNF002.4** | Escalabilidade | Sistema deve suportar 10.000 seguidores simultâneos sem degradação.         | ☁️ Infraestrutura |   🔴 Planejado   |


💡 Observações Técnicas

Modelos: User (com papel follower) ou Follower dedicado.

Autenticação: Usar Laravel Breeze ou Fortify.

Envio de e-mails: Configurar Mailtrap, Postmark ou Resend (em produção).

Tarefas assíncronas: Implementar via Jobs + Queues.

Testes:

Feature tests: Cadastro, Login, Confirmação de e-mail.

Unit tests: Validação de token e expiração.

