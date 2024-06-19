<p align="center">
	<a href="#" target="_blank" title="Visite Retro Community">
		<img src="public/images/logo-retrocommunity-dark.png" alt="Sistema Retro Community" width="240px">
	</a>
</p>

<p align="center">:sparkles: **Plataforma Retro Community: Potencializando a comunidade retrô** :sparkles:</p>


<p align="center">
	<img src="https://img.shields.io/badge/version project-1.0-brightgreen" alt="version project">
    <img src="https://img.shields.io/badge/Php-8.3-informational" alt="stack project">
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

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

##  	Limpeza de cache, config, route and view

```
    php artisan config:clear
    php artisan config:cache
    php artisan route:clear
    php artisan route:cache
    php artisan view:clear
    php artisan view:cache
    php artisan event:clear
    php artisan event:cache
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
