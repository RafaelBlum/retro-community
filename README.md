<p align="center">
	<a href="#" target="_blank" title="Visite Retro Community">
		<img src="public/images/brandname/logo-retrocommunity-dark.png" alt="Sistema Retro Community" width="240px">
	</a>
</p>

<p align="center">:sparkles: **Plataforma Retro Community: Potencializando a comunidade retrô** :sparkles:</p>


<p align="center">
	<img src="https://img.shields.io/badge/version project-1.0-brightgreen" alt="version project">
    <img src="https://img.shields.io/badge/Php-8.2-informational" alt="stack project">
    <img src="https://img.shields.io/badge/Laravel-11.0-informational&color=brightgreen" alt="stack project">
    <img src="https://img.shields.io/badge/Livewire-3.0-informational&color=brightgreen" alt="stack project">
    <img src="https://img.shields.io/badge/Filament-3.2-informational" alt="stack project">
    <img src="https://img.shields.io/badge/TailwindCss-3.1-informational" alt="stack project">
    <img src="https://img.shields.io/static/v1?label=Composer&message=2.6.5&color=brightgreen?style=for-the-badge" alt="stack project">
	<a href="https://opensource.org/licenses/GPL-3.0">
		<img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="GPLv3 License">
	</a>
</p>

## Sobre Retro Community

Este projeto tem como objetivo potencializar a forma como as informações dos canais de streamers do YouTube são apresentadas, 
fornecendo dados detalhados sobre seus posts, incluindo imagens, vídeos e formatação avançada de texto. A ideia é criar uma 
plataforma mais rica e imersiva para os seguidores, bem como para os administradores dos canais, com funcionalidades 
personalizadas de interação e gerenciamento.

##### Funcionalidades
Páginas de Perfil Personalizado para Canais: Cada usuário terá uma página exclusiva para seu canal, exibindo informações detalhadas, como dados sobre o canal, campanhas em andamento, formas de doação (incluindo PIX) e um link direto para o canal na plataforma do YouTube.

Sistema de Postagens e Formatação Avançada: O sistema permite aos streamers criar e gerenciar postagens com imagens, vídeos e formatação de texto avançada, proporcionando uma comunicação mais eficaz e atraente com sua audiência.

##### Frontend Completo:

- Landing Page: Página inicial de apresentação, com informações sobre o projeto e os benefícios para streamers e seus seguidores.
- Home Page: Exibição de canais populares, campanhas ativas e postagens recentes, criando um ambiente dinâmico para os usuários explorarem.
- Blog: Área para exibição de artigos, atualizações e conteúdos relacionados ao universo dos streamers e do YouTube.
- Canais e Campanhas: Página dedicada à visualização de todos os canais e campanhas, com filtros e detalhes de cada um.
- Sobre e Fale Conosco: Páginas institucionais para fornecer mais informações sobre o projeto e oferecer suporte aos usuários.

##### Área Administrativa:

A área administrativa será construída com Filament PHP, fornecendo um painel de controle robusto e intuitivo para gerenciar dados do sistema, campanhas, postagens e usuários.
O acesso à administração será controlado com base nos níveis de permissão do usuário, garantindo a segurança e integridade das informações.

##### Tecnologias Utilizadas
- Backend: Laravel (PHP)
- Frontend: TailwindCSS para construção de layouts modernos e responsivos.
- Área Administrativa: Filament PHP, utilizado para o gerenciamento do sistema, campanhas, postagens e usuários.
- Banco de Dados: MySQL, com gerenciamento e visualização via phpMyAdmin.
- Autenticação: A autenticação será gerenciada pelo próprio Laravel, garantindo segurança e controle de acesso. O login e a área administrativa serão feitos por meio do Filament PHP.
- Design Responsivo: A plataforma será totalmente responsiva, garantindo uma experiência de usuário excelente em dispositivos móveis e desktop.

#### Objetivo
O projeto busca melhorar a interação entre streamers e seus seguidores, proporcionando uma plataforma que combina funcionalidades 
práticas e design moderno. A área administrativa, construída com Filament PHP, oferece uma experiência intuitiva para os administradores, 
permitindo uma gestão eficiente de todo o sistema, enquanto a integração com Laravel e TailwindCSS garante uma plataforma robusta, segura e escalável.


## :books: `DER` Diagramação base do projeto
> As classes do sistema estão claramente definidas em um diagrama de classes.

<p align="center" style="margin-top: 30px">
	<a href="#"  target="_blank" title="Sistema Retro Community">
		<img src="public/docs/diagram-class-RetroCommunity.png" alt="diagram class" width="80%">
	</a>
</p>

### Plugins

- **[Apex Charts](https://filamentphp.com/plugins/leandrocfe-apex-charts)**
- **[Laravel Trend](https://github.com/Flowframe/laravel-trend)**
```
   composer require leandrocfe/filament-apex-charts:"^3.1" 
   php artisan make:filament-apex-charts
   composer require flowframe/laravel-trend
```
- **[Chart widgets - (Usando ChartJS)](https://filamentphp.com/docs/3.x/widgets/charts)**
- ***[Documentação ChartJS](https://www.chartjs.org/docs/latest/)*
```
   php artisan make:filament-widget 
```

## Limpeza de cache, config, route and view

```
    php artisan config:clear
    php artisan config:cache
    php artisan route:clear
    php artisan route:cache
    php artisan view:clear
    php artisan view:cache
    php artisan event:clear
    php artisan event:cache
    
    php artisan optimize:clear
```

> [!IMPORTANT]
> Pendências de desenvolvimento área DASHBOARD

- Dashboard::
  - listar campanhas e canais 
  - Ajustar tipo de acesso dos usuários [doc. infor](https://filamentphp.com/docs/1.x/admin/resources#authorization) | [canAccessFilament falhe](https://v2.filamentphp.com/tricks/redirect-in-case-canaccessfilament-fails)| [permissões](https://laraveldaily.com/post/laravel-roles-permissions-middleware-gates-policies?mtm_campaign=post-footer-premium)
  - Ajustar politicas de acesso geral na area administrativa.
- Posts
  - Criar linha marcada para post publicado. [Doc](https://www.youtube.com/watch?v=7SnzOjPV7ms)
  - View/editar Colocar imagem acima grande
  - ajustar imagens para remover a antiga [create/edit]
  - criar pontilhados MENU pra view COM USER normal
- Campanhas
  - ok
- Canais
  - OK
- Usuários
  - ok
- Categories
  - ok

> [!IMPORTANT]
> Pendências de desenvolvimento área FRONT-END
- 

> [!IMPORTANT]
> NOVA BRANCH Multi-tenancy na V.2 - FUTURO
[Multi-tenancy](https://filamentphp.com/docs/3.x/panels/tenancy)

> [!IMPORTANT]
> Custom pages docs
[Custom Pages Resume - Curriculo page](https://www.youtube.com/watch?v=iFoVoa4l95U)
[Customizing User Profile and Password - components](https://notes.suluh.my.id/profile-page-filament-3)
[Customizing Profile:Integrating Multiple Forms](https://medium.com/@laravelprotips/personalizing-the-filament-profile-page-expanding-the-design-and-integrating-multiple-forms-62db7ca68343)

> [!WARNING]
> BUILD: Apontamento do `public_html` para `public` do projeto laravel

```
    # Modifico
    mv public_html public_html_bpk

    # Nesta parte, o `www` estará com erro, pois não encontra a public_html
    # solução de apontamento
    ln -s nameprojeto/public public_html
    ls -la
```

> [!WARNING]
> Importante para realizar deploy no servidor compartilhado
> Deletar o link symbolico e no servidor usar comando php artisan storage:link
> Ajustar dados de banco

> [!NOTE]
> :sparkles: Helpful advice for doing things better or more easily.

> [!TIP]
> Helpful advice for doing things better or more easily.

> [!IMPORTANT]
> Key information users need to know to achieve their goal.

> [!WARNING]
> Urgent info that needs immediate user attention to avoid problems.

> [!CAUTION]
> Links de estudos e layouts.
- https://astrowind.vercel.app
- https://github.com/filamentphp/demo


> [!WARNING]
> Comandos lista

1. Lista de comandos geral
```shell
    composer update
    npm install
    npm run build
    npm run dev
```
