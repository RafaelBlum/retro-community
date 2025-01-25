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

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and 
creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many 
web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.


## :books: `DER` Diagramação base do projeto
> As classes do sistema estão claramente definidas em um diagrama de classes.

<p align="center" style="margin-top: 30px">
	<a href="#"  target="_blank" title="Sistema Retro Community">
		<img src="public/docs/diagram-class-RetroCommunity.png" alt="diagram class" width="80%">
	</a>
</p>

### Plugins

- **[Apex Charts](https://filamentphp.com/plugins/leandrocfe-apex-charts)**
```
   composer require leandrocfe/filament-apex-charts:"^3.1" 
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

- OK:: Criar autorizações entre ADMIN e usuários. [doc. infor](https://filamentphp.com/docs/1.x/admin/resources#authorization) | [canAccessFilament falhe](https://v2.filamentphp.com/tricks/redirect-in-case-canaccessfilament-fails)| [permissões](https://laraveldaily.com/post/laravel-roles-permissions-middleware-gates-policies?mtm_campaign=post-footer-premium)
- OK:: Criar super Admin com poder total. :)
- OK:: Criar Perfil de usuário e retirar user logado da lista
  - OK:: [Perfil de usuário](https://docs.laravel-filament.cn/docs/widgets)
- Criar linha marcada para post publicado. [Doc](https://www.youtube.com/watch?v=7SnzOjPV7ms)
- Criar campanha
- Criar dashboar com Widgets e graficos
- Post ajustar datas de postagens e layout
-

> [!IMPORTANT]
> Pendências de desenvolvimento área SITE
- Ajustar e redefinir quais sessões o site terá
  - bug: Header fica acima da navbar
  - 
  - Footer
- Ajustar imagens POST
- Ajustar ControllerPost para buscar posts em publicação

> [!IMPORTANT]
> NOVA BRANCH Multi-tenancy
[Multi-tenancy](https://filamentphp.com/docs/3.x/panels/tenancy)

> [!IMPORTANT]
> Custom pages docs
[Custom Pages Resume - Curriculo page](https://www.youtube.com/watch?v=iFoVoa4l95U)
[Customizing User Profile and Password - components](https://notes.suluh.my.id/profile-page-filament-3)
[Customizing Profile:Integrating Multiple Forms](https://medium.com/@laravelprotips/personalizing-the-filament-profile-page-expanding-the-design-and-integrating-multiple-forms-62db7ca68343)

> [!WARNING]
> Apontamento do `public_html` para `public` do projeto laravel

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
