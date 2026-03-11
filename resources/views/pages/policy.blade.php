<x-layout>


    <x-partials.navbar-section/>

    <main>
        <section class="bg-white">
                <div class="absolute inset-0 pointer-events-none" aria-hidden="true"></div>
                <div class="mx-auto px-4 max-w-7xl sm:px-6">
                    <div class="pointer-events-none md:pt-[76px] pt-0"></div>
                    <div class="md:py-20 py-12 up">
                        <div class="mx-auto max-w-5xl md:pb-16 pb-10 text-center">
                            <p class="font-bold text-base text-secondary tracking-wide uppercase">Sobre nossas políticas</p>
                            <h1 class="font-bold font-heading leading-tighter tracking-tighter mb-4 md:text-6xl text-5xl">
                                Políticas e privacidades<br>
                                <span class="dir max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl">{{ config('app.name') }}</span></h1>
                            <div class="mx-auto max-w-3xl">
                                <p class="text-muted text-xl mb-6">
                                    Bem-vindo as politicas e privacidade de uso da <a href="{{route('app.home')}}" class="text-purple-600 hover:underline">Retrô Community</a>,
                                    sua comunidade dedicada aos clássicos dos games retrô!
                                    Aqui vamos saber tudo que você precisa entender sobre a política de privacidade da Retrô community.
                                </p>

                            </div>
                        </div>
                        <div>
                            <div class="m-auto max-w-5xl">
                                <img alt="Caos Image" class="up mx-auto w-full rounded-md" loading="eager"
                                     src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80">
                            </div>
                        </div>

                        <div class="mx-auto max-w-5xl md:pb-16 pb-10 mt-16 text-justify up text-gray-900">
                            <p class="mb-4">
                                Bem-vindo à <a href="{{route('app.home')}}" class="text-purple-600 hover:underline">Retrô Community</a>.
                                Esta Política de Privacidade descreve nossas práticas em relação à coleta, uso e compartilhamento de informações pessoais por meio de nossos produtos e serviços digitais,
                                Ao usar nossos serviços, fornecidos, você concorda com a coleta e uso de informações conforme descrito nesta política.
                            </p>

                            <h3 class="text-lg font-semibold text-gray-800">Informações coletadas</h3>
                            <p class="mb-4">
                                Na <a href="{{route('app.home')}}" class="text-purple-600 hover:underline">Retrô Community</a>,
                                sua privacidade é nossa prioridade. Não compartilhamos, vendemos ou alugamos suas informações pessoais a terceiros.
                                Todos os dados armazenados por meio de nossos serviços são de sua propriedade ou de sua empresa e podem ser transferidos
                                ou excluídos mediante solicitação, embora isso possa limitar o acesso a determinados conteúdos.

                            </p>


                            <h3 class="text-lg font-semibold text-gray-800">Seus direitos</h3>
                            <p class="mb-4">
                                Você tem o direito de acessar, corrigir e solicitar a exclusão de seus dados pessoais, com certas limitações no acesso aos nossos produtos e serviços.
                            </p>


                            <h3 class="text-lg font-semibold text-gray-800">Segurança</h3>
                            <p class="mb-4">
                                Estamos comprometidos com a segurança dos seus dados, implementando criptografia e padrões regulares de segurança.
                            </p>

                            <h3 class="text-lg font-semibold text-gray-800">Responsabilidades</h3>
                            <p class="mb-4">
                                Toda e qualquer informação postada na <a href="{{route('app.home')}}" class="text-purple-600 hover:underline">Retrô Community</a>
                                e de responsabilidade do usuário ou canal e qualquer tipo de abuso ou ilegalidade, poderá sofrer banimento com deleção de todas as suas informações
                                ou em caso de solicitações das informações suas por autoridades competentes, as mesmas podem ser enviadas em caso de crime ou investigação.
                            </p>

                            <h3 class="text-lg font-semibold text-gray-800">Privacidade das crianças</h3>
                            <p class="mb-4">
                                O <a href="{{route('app.home')}}" class="text-purple-600 hover:underline">Retrô Community</a> é destinado ao uso por indivíduos
                                que atingiram a idade legal em sua jurisdição e residem em regiões onde tal uso é permitido. Não coletamos intencionalmente dados de indivíduos abaixo da idade legal.
                            </p>

                            <h3 class="text-lg font-semibold text-gray-800">Alterações na Política de Privacidade</h3>
                            <p class="mb-4">
                                Podemos modificar esta política a qualquer momento. O uso contínuo do Preline significa aceitação dessas mudanças.
                            </p>

                            <h3 class="text-lg font-semibold text-gray-800">Contate-nos</h3>
                            <p class="mb-4">
                                Para dúvidas sobre esta Política de Privacidade ou nossas práticas de privacidade, entre em contato conosco pelo
                                <a href="{{route('app.home')}}" class="text-purple-600 hover:underline">SUPORTE</a> em nosso site.
                            </p>

                            <h3 class="text-lg font-semibold text-gray-800">Acordo</h3>
                            <p class="mb-4">
                                Ao utilizar os serviços da <a href="{{route('app.home')}}" class="text-purple-600 hover:underline">Retrô Community</a>,
                                você reconhece que entendeu e concorda com esta Política de Privacidade.
                            </p>

                            <h3 class="text-lg font-semibold text-gray-800">Alterações de privacidade</h3>
                            <p class="mb-4">
                                Se mudarmos nossa política de privacidade, publicaremos essas alterações nesta página. Usuários registrados receberão um e-mail que descreve as alterações feitas na política de privacidade.
                            </p>
                        </div>
                    </div>
                </div>
        </section>
    </main>

    <x-partials.footer />

    <script>

    </script>


</x-layout>
