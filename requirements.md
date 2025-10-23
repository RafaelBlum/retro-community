## 📘 Metodologias ágeis
#### Tabela de desenvolvimento dos Requisitos funcionais fracionadas no decorrer do desenvolvimento. Tabela de apoio as etapas.

### 🧩 RF001 — Edição de usuário, Canal e campanha
🔹 Sub-Requisitos Funcionais

| Código      | Nome                                           | Descrição                                                                                             | Prioridade |         Status        | Critérios de Aceitação                       |
|:------------|:-----------------------------------------------| :---------------------------------------------------------------------------------------------------- | :--------: | :-------------------: |:---------------------------------------------|
| **RF001.1** | **Formulário de edição**                       | Imagens devem ser deletada ou substituida ao se editar ou deletar user. |   🔺 Alta  |      🟢 Concluído     | Remover images anteriores, menos a padrão.   |
| **RF001.2** | **Formulário de edição**   | Campanha não é obrigatória ter, mas se adicionar dados em algum campo, precisa adicionar todos e remover.              |   🔺 Alta  | 🟡 Em desenvolvimento | Se for um campo preenchido, não deve salvar. |


### 🧩 RF002 — Cadastro de Seguidores

#### Observações de Implementação (para o desenvolvedor)

- [ ] Criar Model Follower ou utilizar User com papel follower.
- [ ] Implementar verificação por Laravel Breeze ou Laravel Fortify.
- [ ] Configurar Mailtrap, Postmark ou Resend em ambiente de testes.
- [ ] Usar Jobs e Queues para envio de e-mail assíncrono.
- Testes: Feature Test (Cadastro, Login, Confirmação de E-mail) e Unit Test (Token, Expiração).

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
