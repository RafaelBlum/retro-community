@if(Route::current()->getName() === 'filament.admin.auth.login')
    <img src="{{asset('images/brandname/logo-retrocommunity-dark.png')}}"
         alt="{{config('app.name')}}"
         title="{{config('app.name')}}"
         width="220"
    >
@else
    <img src="{{asset('images/brandname/horizontal-retrocommunity.png')}}"
         alt="{{config('app.name')}}"
         title="{{config('app.name')}}"
         width="200"
    >
@endif

{{-- Precisa somente de uma condição para trocar as logos quando sistema esta dark e light e retirar o style --}}
