<p align="center">
  <a href="#" target="_blank" title="Visite Retro Community">
    <img src="public/images/brandname/logo-retrocommunity-dark.png" alt="Sistema Retro Community" width="340px">
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

## :books: `DER` Diagramação do projeto | Prototipagem
> As classes do sistema estão claramente definidas em um diagrama de classes **(em analise)**.

<p align="center" style="margin-top: 30px">
	<a href="#"  target="_blank" title="Sistema Retro Community">
		<img src="public/docs/diagram-class-RetroCommunity.png" alt="diagram class" width="60%">
	</a>
</p>



## ⚙️  `RNF` Requisitos não funcionais

##### Tecnologia  Função
- [X] [RNF001] Laravel, um framework backend principal, responsável pela estrutura MVC e APIs.
- [X] [RNF002] Filament PHP na última versão 4.18 para a área administrativa, trazendo ambiente moderno, personalizável e seguro.
- [X] [RNF003] Tailwind CSS v4 para o frontend e trazer uma estilização moderna e responsiva.
- [X] [RNF004] Alpine.js	para interatividade no frontend de forma leve.
- [X] [RNF005] Livewire v3 para componentes dinâmicos reativos sem utilizar o JavaScript manual em alguns casos.
- [X] [RNF006] MySQL	Banco de dados relacional principal.
- [X] [RNF007] Vite	Build rápido e integração com Tailwind.
- [X] [RNF008] JSConfetti (frontend)	Efeitos visuais para animações.
- [X] [RNF009] ScrollReveal para animar elementos nas páginas.
- [X] [RNF010] Javascript para personalização de efeitos e interação.

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


## ⚙️ Requisitos funcionais
> Avaliação das especificações do software durante o desenvolvimento para verificar se os requisitos de qualidade estão
sendo atendidos.

- [ ] [RF000] Diagrama de classes
- [ ] [RF000] Criação de projeto laravel
- [ ] [RF000] Configurações iniciais laravel e instalações bibliotecas.
- [ ] [RF000] Criação banco de dados
- [ ] [RF000]
    - [ ] [RF000-0]
    - [ ] [RF000-0]
