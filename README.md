<p align="center">
  <a href="https://github.com/RafaelBlum/retro-community" target="_blank" title="Visite Retrô Community">
    <img src="public/images/brandname/logo-retrocommunity-dark.png" alt="Sistema Retrô Community" width="340px">
  </a>
</p>


<h3 align="center">✨ Plataforma Retro Community ✨</h3>
<p align="center"><strong>Mais do que uma rede de canais, é um ponto de encontro para apaixonados por jogos, cultura retrô e streaming independente.</strong></p>

<p align="center">
  <img src="https://img.shields.io/badge/version-1.0-brightgreen" alt="version project">
  <img src="https://img.shields.io/badge/PHP-8.2.12-informational" alt="stack project">
  <img src="https://img.shields.io/badge/Laravel-12.30.1-ff2d20" alt="stack project">
  <img src="https://img.shields.io/badge/Livewire-3.6.4-purple" alt="stack project">
  <img src="https://img.shields.io/badge/Filament-4.0.18-blueviolet" alt="stack project">
  <img src="https://img.shields.io/badge/TailwindCSS-4.1.13-38bdf8" alt="stack project">
  <img src="https://img.shields.io/badge/Composer-2.8.4-brightgreen" alt="stack project">
  <a href="https://opensource.org/licenses/MIT">
    <img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="MIT License">
  </a>
</p>

---

## 📘 Contextualização e Objetivo

O Retro Community é uma plataforma inovadora criada para potencializar a presença digital de criadores de conteúdo do YouTube, oferecendo um espaço que vai muito além da plataforma de vídeos e sempre zelando pela segurança, escalabilidade e fácil gerenciamento.

Seu objetivo é conectar canais, inscritos e comunidades em um ambiente interativo, imersivo e totalmente voltado à experiência retrô — com recursos que integram dados do YouTube e funcionalidades exclusivas dentro da própria plataforma.

## 🌟 **Proposta** dos principais Recursos

- Páginas destacando conteúdos principais, como: **postagens, canais, campanhas, página sobre a plataforma e perfil de cada criador de conteúdo**.

- **Página de perfil completa**, onde pode exibir:
  - Informações do canal (título, descrição, logo e etc).
  - Inserir sua Campanhas e QRcode do livePix.
  - Links para redes sociais e um vídeo.
  - Seção de “Canais Parceiros”, fortalecendo a rede entre criadores.
  - Dados dos seus Seguidores da plataforma.
  - Integração com a API do YouTube para sincronização de número real de inscritos e vídeos.
  - Ao logar o usuário tem a possibilidade de inciar sorteio com roleta.

- Controle de acesso
  - Os usuários terão perfil de acesso
  - Seguidores devem criar cadastro simples para seguir canal e ter acesso a comentários.

- Notificações
  - Notificações por e-mail para os seguidores quando o canal postar algo.
  - Notificação por e-mail para confirmar o acesso do streamer ou seguidor.

- 📰 Sistema de Postagens
  - Criação e gerenciamento de posts com suporte a um editor avançado permitindo editar e visualizar conteúdo.
  - Comentários de seguidores.
  - Organização por categorias e tags.
  
- Recursos Especiais
  - Ranking de Canais Mais Seguidos;
  - Validação de e-mail e controle de limite de interações por usuário (ex: 1 comentário por post/dia).
  - Criação de enquetes simples.

- 🛠️ Área Administrativa
  - Área especial para administradores.
  - Painel intuitivo para gerenciar seus conteúdos e dados.
  - Controle de acesso por **perfis e permissões**, garantindo segurança e integridade.



<p align="center">
  <a href="https://github.com/RafaelBlum/retro-community" target="_blank" title="Visite Retrô Community">
    <img src="public/images/brandname/mapa.png" alt="Sistema Retrô Community" width="340px">
  </a>
</p>



## 🧩 Especificação de Requisitos do Sistema

A seguir estão definidos os requisitos que orientam o desenvolvimento da plataforma **Retro Community**, separando **Requisitos Funcionais (RF)** e **Requisitos Não Funcionais (RNF)**.

Para analise e desenvolvimento dos requisitos, terá a **[documentação ágil](/requirements.md)** de desenvolvimento, o que garantem que o sistema atenda às necessidades do projeto, mantenha alta qualidade técnica e ofereça uma experiência estável, segura e imersiva.

> Status: 🟡 Em desenvolvimento | 🟢 Concluído | 🔴 Pendente
---

## 🧭 `RF` Requisitos Funcionais

Os **requisitos funcionais** descrevem as **funcionalidades e comportamentos esperados** do sistema — ou seja, o que a plataforma deve fazer.

|  Status  | ID          | Funcionalidade                           | Descrição                                                                                                                                            |
|----|-------------|------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------|
| 🟡 | **RF001**   | **Autenticação e Perfis de Acesso**      | O sistema deve permitir autenticação de usuários (streamers e seguidores), com controle de acesso baseado em perfis e permissões.                    |
| 🔴 | **RF002**   | **Cadastro de Seguidores**               | O seguidor deve poder realizar um cadastro simples para seguir canais, comentar e receber notificações.                                              |
| 🟡 | **RF003**   | **Página Inicial (Home)**                | O sistema deve exibir conteúdos principais como postagens em destaque, canais e campanhas ativas.                                                    |
| 🟡 | **RF004**   | **Gestão de Canais**                     | Cada criador deve poder gerenciar as informações do seu canal (nome, descrição, logo, links, vídeo de apresentação e QR Code do LivePix).            |
| 🟡 | **RF005**   | **Página de Perfil do Canal**            | O sistema deve disponibilizar uma página personalizada por canal, exibindo informações do criador, campanhas, vídeos, seguidores e canais parceiros. |
| 🔴 | **RF006**   | **Integração com a API do YouTube**      | O sistema deve integrar-se à API do YouTube para sincronizar dados do canal, como número de inscritos e vídeos.                                      |
| 🟢 | **RF007**   | **Sistema de Postagens**                 | O sistema deve permitir a criação, edição e exclusão de postagens, com suporte a editor avançado e visualização prévia.                              |
| 🟡 | **RF008**   | **Categorias e Tags**                    | O sistema deve permitir a organização das postagens por categorias e tags para facilitar a navegação e busca.                                        |
| 🔴 | **RF009**   | **Comentários em Postagens**             | O sistema deve permitir que seguidores comentem nas postagens, respeitando limitações definidas (ex: 1 comentário por dia).                          |
| 🔴 | **RF010**   | **Validação de E-mail**                  | O sistema deve enviar e-mails de verificação para confirmar o cadastro de novos usuários (streamers e seguidores).                                   |
| 🔴 | **RF011**   | **Notificações por E-mail**              | O sistema deve enviar notificações automáticas para seguidores quando um canal que seguem publicar um novo post.                                     |
| 🟡 | **RF012**   | **Campanhas de Canais**                  | Os criadores devem poder criar e gerenciar campanhas associadas aos seus canais, incluindo imagens, descrições e QR Code de doação.                  |
| 🟡 | **RF013**   | **Roleta de Sorteio**                    | O sistema deve disponibilizar uma roleta interativa para sorteios, acessível apenas para criadores logados.                                          |
| 🔴 | **RF014**   | **Ranking de Canais Mais Seguidos**      | O sistema deve exibir um ranking atualizado dos canais com maior número de seguidores na plataforma.                                                 |
| 🔴 | **RF015**   | **Enquetes Simples**                     | O sistema deve permitir a criação de enquetes básicas para engajamento dos seguidores.                                                               |
| 🔴 | **RF016**   | **Sistema de Notificações Internas**     | O sistema deve exibir notificações dentro da plataforma (no painel do usuário) relacionadas a novos posts, campanhas ou interações.                  |
| 🟡 | **RF017**   | **Painel Administrativo (Filament PHP)** | O sistema deve possuir uma área administrativa para controle completo de usuários, posts, campanhas, enquetes, permissões e configurações.           |
| 🟡 | **RF018**   | **Controle de Permissões e Papéis**      | Deve haver controle granular de acesso, garantindo que apenas usuários autorizados possam alterar ou excluir determinados conteúdos.                 |
| 🟡 | **RF019**   | **Dashboard Analítica**                  | O painel administrativo deve apresentar dados estatísticos, como número de canais, posts, seguidores e interações.                                   |
| 🟡 | **RF020**   | **Segurança e Integridade dos Dados**    | O sistema deve assegurar a proteção dos dados de usuários e canais, evitando acessos não autorizados ou manipulações indevidas.                      |

---

## ⚙️ `RNF` Requisitos Não Funcionais

Os **requisitos não funcionais** especificam **como** o sistema deve ser desenvolvido, definindo tecnologias, padrões de qualidade, desempenho e manutenção.

| ID | Tecnologia / Ferramenta | Descrição |
|----|---------------------------|------------|
| 🟢 **RNF001** | **Laravel** | O sistema deve utilizar o framework **Laravel** como base backend, adotando a arquitetura **MVC** e fornecendo **APIs RESTful**. |
| 🟢 **RNF002** | **Filament PHP v4.18** | O painel administrativo deve ser desenvolvido com **Filament PHP**, garantindo um ambiente moderno, personalizável e seguro. |
| 🟢 **RNF003** | **Tailwind CSS v4** | O frontend deve utilizar **Tailwind CSS** para assegurar uma interface moderna, responsiva e consistente. |
| 🟢 **RNF004** | **Alpine.js** | O sistema deve adotar **Alpine.js** para prover interatividade leve e reativa no frontend. |
| 🟢 **RNF005** | **Livewire v3** | Deve ser utilizado **Livewire v3** para criação de componentes dinâmicos e reativos, reduzindo a necessidade de scripts JavaScript manuais. |
| 🟢 **RNF006** | **MySQL** | O sistema deve utilizar **MySQL** como banco de dados relacional principal, garantindo integridade e desempenho nas transações. |
| 🟢 **RNF007** | **Vite** | O processo de build deve ser gerenciado por **Vite**, proporcionando empacotamento rápido de assets e integração eficiente com o Tailwind CSS. |
| 🟢 **RNF008** | **JSConfetti** | O frontend deve integrar a biblioteca **JSConfetti** para prover efeitos visuais e feedback animado em eventos específicos. |
| 🟢 **RNF009** | **ScrollReveal** | Deve ser utilizado **ScrollReveal** para animações de entrada de elementos, aprimorando a experiência visual e a usabilidade. |
| 🟢 **RNF010** | **JavaScript (nativo)** | O sistema deve utilizar **JavaScript nativo** para personalizações adicionais de efeitos e interações no frontend. |

## :books: `DER` Diagramação do projeto | Prototipagem
> As classes do sistema estão claramente definidas em um diagrama de classes **(em analise)**.

<p align="center" style="margin-top: 30px">
	<a href="#"  target="_blank" title="Sistema Retro Community">
		<img src="public/images/docs/diagram.png" alt="diagram class" width="60%">
	</a>
</p>

### 🧱 Observações Gerais

- O projeto adota a arquitetura **TALL Stack** (Tailwind, Alpine, Laravel, Livewire).
- Todas as tecnologias seguem **versões estáveis e atualizadas**.
- O sistema prioriza **segurança, escalabilidade, desempenho e experiência do usuário**.
- As dependências são gerenciadas por **Composer** (PHP) e **npm** (JavaScript).
- A documentação técnica e o código seguem boas práticas de **manutenibilidade** e **padronização**.

![PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-4E56A6?logo=laravel&logoColor=white)
![Filament](https://img.shields.io/badge/FilamentPHP-2E5BFF?logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?logo=mysql&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-8BC0D0?logo=alpine.js&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?logo=javascript&logoColor=black)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-06B6D4?logo=tailwindcss&logoColor=white)
![JSConfetti](https://img.shields.io/badge/JSConfetti-0769AD?logo=tailwindcss&logoColor=white)
![ScrollReveal](https://img.shields.io/badge/ScrollReveal-0769AD?logo=tailwindcss&logoColor=white)

