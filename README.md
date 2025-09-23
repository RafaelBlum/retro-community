<p align="center">
	<a href="#" target="_blank" title="Visite Retro Community">
		<img src="public/images/brandname/logo-retrocommunity-dark.png" alt="Sistema Retro Community" width="240px">
	</a>
</p>

<p align="center">:sparkles: **Plataforma Retro Community: Potencializando a comunidade retrô** :sparkles:</p>


<p align="center">
	<img src="https://img.shields.io/badge/version project-1.0-brightgreen" alt="version project">
    <img src="https://img.shields.io/badge/Php-8.2.12-informational" alt="stack project">
    <img src="https://img.shields.io/badge/Laravel-12.30.1-informational&color=brightgreen" alt="stack project">
    <img src="https://img.shields.io/badge/Livewire-3.6.4-informational&color=brightgreen" alt="stack project">
    <img src="https://img.shields.io/badge/Filament-4.0.18-informational" alt="stack project">
    <img src="https://img.shields.io/badge/TailwindCss-4.1.13 -informational" alt="stack project">
    <img src="https://img.shields.io/static/v1?label=Composer&message=2.8.4&color=brightgreen?style=for-the-badge" alt="stack project">
	<a href="https://opensource.org/licenses/GPL-3.0">
		<img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="GPLv3 License">
	</a>
</p>

# 🎮 Retro Community

O **Retro Community** é um projeto que busca potencializar a forma como as informações dos canais de streamers do **YouTube** são apresentadas, fornecendo uma plataforma rica, interativa e imersiva tanto para seguidores quanto para administradores dos canais.

Ele reúne recursos de gerenciamento, personalização e interação, permitindo que streamers tenham maior controle sobre seus conteúdos e que seguidores desfrutem de uma experiência mais completa.

---

## 🚀 Funcionalidades

### 🔹 Páginas de Perfil Personalizado
- Cada canal terá uma página exclusiva, exibindo:
    - Informações detalhadas sobre o canal.
    - Campanhas em andamento.
    - Formas de doação (incluindo **PIX**).
    - Link direto para o canal no YouTube.

### 🔹 Sistema de Postagens Avançado
- Criação e gerenciamento de posts com:
    - **Imagens**.
    - **Vídeos**.
    - **Formatação avançada de texto**.
- Comunicação mais atraente e eficaz entre streamers e audiência.

---

## 🌐 Frontend

- **Landing Page** → Página inicial com informações do projeto e benefícios.
- **Home Page** → Destaque para canais populares, campanhas ativas e posts recentes.
- **Blog** → Artigos, atualizações e conteúdos sobre o universo dos streamers.
- **Canais e Campanhas** → Visualização completa, com filtros e detalhes.
- **Sobre & Fale Conosco** → Páginas institucionais para suporte e informações adicionais.

---

## 🛠️ Área Administrativa

- Desenvolvida com **Filament PHP**.
- Painel intuitivo para gerenciar:
    - Usuários.
    - Campanhas.
    - Postagens.
    - Demais dados do sistema.
- Controle de acesso por **perfis e permissões**, garantindo segurança e integridade.

---

## 💻 Tecnologias Utilizadas

- **Backend:** [Laravel](https://laravel.com/) (PHP).
- **Frontend:** [TailwindCSS](https://tailwindcss.com/) para layouts modernos e responsivos.
- **Admin Panel:** [Filament PHP](https://filamentphp.com/).
- **Banco de Dados:** MySQL (gerenciado via phpMyAdmin).
- **Autenticação:** Nativa do Laravel, integrada ao Filament.
- **Design Responsivo:** Compatível com dispositivos móveis e desktop.

---

## 🎯 Objetivo

O Retro Community tem como propósito **aproximar streamers e seguidores**, fornecendo uma plataforma:

✔️ Moderna.  
✔️ Segura.  
✔️ Escalável.  
✔️ Fácil de gerenciar.

A integração de **Laravel, Filament PHP e TailwindCSS** garante robustez no backend, praticidade no gerenciamento administrativo e uma experiência de usuário fluida no frontend.



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

## Atualização do Filament e livewire

```
    composer update filament/filament livewire/livewire
    php artisan about
```

> [!IMPORTANT]
> Pendências de desenvolvimento área DASHBOARD
- https://filamentphp.com/docs/3.x/forms/validation
- https://filamentphp.com/docs/3.x/forms/fields/text-input#size-validation

- Dashboard::
  - listar campanhas e canais 
  - Ajustar tipo de acesso dos usuários [doc. infor](https://filamentphp.com/docs/1.x/admin/resources#authorization) | [canAccessFilament falhe](https://v2.filamentphp.com/tricks/redirect-in-case-canaccessfilament-fails)| [permissões](https://laraveldaily.com/post/laravel-roles-permissions-middleware-gates-policies?mtm_campaign=post-footer-premium)
  - Ajustar politicas de acesso geral na area administrativa.
- Posts
  - validar campos
- Campanhas
  - validar campos
- Canais
  - validar campos
- Usuários
  - validar campos
- Profile
  - validar campos
- Categories
  - validar campos

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
- https://app-sorteos.com/pt/apps/girar-roleta-aleatoria



