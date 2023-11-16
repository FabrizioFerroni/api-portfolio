@section('title', 'Consultas web')
@section('breadcrumbs')
    <li aria-current="page">
        <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-white">Consultas Web</span>
        </div>
    </li>
@endsection
<x-app-layout>
    @section('style')
        <noscript>
            <style>
                /**
                                                          * Reinstate scrolling for non-JS clients
                                                          */
                .simplebar-content-wrapper {
                    scrollbar-width: auto;
                    -ms-overflow-style: auto;
                }

                .simplebar-content-wrapper::-webkit-scrollbar,
                .simplebar-hide-scrollbar::-webkit-scrollbar {
                    display: initial;
                    width: initial;
                    height: initial;
                }
            </style>
        </noscript>
    @endsection
    <div>
        <div
            class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Consultas Web</h1>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div
                    class="h-128 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 flex flex-col md:flex-row ">
                    <div id="mail-data" class=" border-r-2 border-gray-200 dark:border-gray-700 w-full md:w-1/3 overflow-auto h-[119px] md:h-auto">
                        @foreach ($contactos as $index => $contacto)
                            <div id="mail-{{ $contacto->id }}" data-id="{{ $contacto->id }}"
                                class=" cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 group p-6 {{ $index < count($contactos) - 1 ? 'border-b-2' : '' }} border-gray-200 dark:border-gray-700 text-white flex flex-col">
                                <p class="text-gray-900 font-bold dark:text-white">{{ $contacto->nombre }}
                                    {{ $contacto->apellido }}</p>
                                <span
                                    class="text-gray-700 pt-0.5 text-sm dark:text-gray-200">{{ $contacto->asunto }}</span>
                                <small
                                    class="text-gray-400 pt-2 text-xs dark:text-gray-400">{{ Str::limit($contacto->mensaje, 40, '...') }}</small>
                            </div>
                        @endforeach
                    </div>
                    <div id="no-mail"
                        class="flex w-full flex-col justify-center items-center text-white  overflow-auto p-10 md:p-0 h-[-webkit-fill-available] md:h-auto">
                       <div class="flex justify-center items-center flex-col">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 2-8.4 7.05a1 1 0 0 1-1.2 0L1 2m18 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1m18 0v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2" />
                    </svg>
                    <span class="text-gray-800 dark:text-white">No hay mensajes</span>
                       </div>
                    </div>
                    <div id="mail-lect" class="hidden w-full flex-col  text-gray-800 dark:text-white ">
                        <div class="flex justify-between items-center border-b-2 border-gray-200 dark:border-gray-700">
                            <div id="asunto" class="font-bold text-lg px-6 py-2 "></div>
                            <div class="px-6 py-2">
                                <a href="javascript:void(0);" id="cerrarMail"><svg
                                        class="w-3 h-3 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg></a>
                            </div>
                        </div>
                        <div id="info" class="px-6 py-2 border-b-2 border-gray-200 dark:border-gray-700">
                            <div class="flex flex-col md:flex-row justify-between items-center">
                                <div class="flex flex-col md:flex-row justify-start items-center gap-4">
                                    <img src="" class="rounded-full w-10 h-10" alt="Img contacto"
                                        id="imgInteresado">
                                    <div class="flex flex-col">
                                        <p class="font-bold" id="nombreInteresado"></p>
                                        <small id="emailInteresado"></small>
                                    </div>
                                </div>
                                <div class="flex flex-col  justify-center items-center md:justify-end md:items-end pt-2 md:pt-0 ">
                                    <div class="flex flex-row gap-2 justify-center items-center md:justify-end md:items-end">
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 16">
                                            <path
                                                d="M12.5 3.046H10v-.928A2.12 2.12 0 0 0 8.8.164a1.828 1.828 0 0 0-1.985.311l-5.109 4.49a2.2 2.2 0 0 0 0 3.24L6.815 12.7a1.83 1.83 0 0 0 1.986.31A2.122 2.122 0 0 0 10 11.051v-.928h1a2.026 2.026 0 0 1 2 2.047V15a.999.999 0 0 0 1.276.961A6.593 6.593 0 0 0 12.5 3.046Z" />
                                        </svg>
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                            <path
                                                d="M13.606 3.748V2.53a1.542 1.542 0 0 0-.872-1.431 1.352 1.352 0 0 0-1.472.2L6.155 5.552a1.6 1.6 0 0 0 0 2.415l5.108 4.25a1.355 1.355 0 0 0 1.472.2 1.546 1.546 0 0 0 .872-1.428v-1.09a4.721 4.721 0 0 1 3.7 2.868 1.186 1.186 0 0 0 1.08.73 1.225 1.225 0 0 0 1.213-1.286v-1.33a6.923 6.923 0 0 0-5.994-7.133Z" />
                                            <path
                                                d="m2.434 6.693 5.517-4.95A1 1 0 0 0 6.615.257L1.1 5.205a2.051 2.051 0 0 0-.01 3.035l5.61 5.088a1 1 0 1 0 1.344-1.482l-5.61-5.153Z" />
                                        </svg>
                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 17">
                                            <path
                                                d="M2.057 6.9a8.718 8.718 0 0 1 6.41-3.62v-1.2A2.064 2.064 0 0 1 9.626.2a1.979 1.979 0 0 1 2.1.23l5.481 4.308a2.107 2.107 0 0 1 0 3.3l-5.479 4.308a1.977 1.977 0 0 1-2.1.228 2.063 2.063 0 0 1-1.158-1.876v-.942c-5.32 1.284-6.2 5.25-6.238 5.44a1 1 0 0 1-.921.807h-.06a1 1 0 0 1-.953-.7A10.24 10.24 0 0 1 2.057 6.9Z" />
                                        </svg>
                                    </div>
                                    <p id="fechaContacto"></p>
                                </div>
                            </div>
                        </div>
                        <div class="p-6" id="msgInteresado"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                new SimpleBar(document.getElementById('mail-lect'), {
                    autoHide: false
                });

                let mailDataContainer = document.getElementById('mail-data');
                let simpleBarInstance = new SimpleBar(mailDataContainer, {
                    autoHide: false,
                    forceVisible: true
                });

                if (simpleBarInstance) {
                    mailDataContainer.style.overflow = 'hidden';
                }

                mailDataContainer.addEventListener('scroll', function() {
                    if (!simpleBarInstance) {
                        mailDataContainer.style.overflow = 'auto';
                    }
                });

                let mailElements = document.querySelectorAll('#mail-data [id^="mail-"]');

                mailElements.forEach(item => {
                    item.addEventListener('click', () => {
                        const anterior = document.querySelector(
                            '.active');
                        if (anterior) anterior.classList.remove(
                            'active');
                        item.classList.add('active');
                    })
                });

                mailElements.forEach(function(element) {
                    element.addEventListener('click', function() {
                        var contactId = this.getAttribute('data-id');

                        let url = `${window.location.origin}/consultas-web/${contactId}`;

                        fetch(url)
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error(`HTTP error! Status: ${response.status}`);
                                }
                                return response.json();
                            })
                            .then(data => {
                                const nombreInteresado = document.getElementById(
                                    'nombreInteresado');
                                const emailInteresado = document.getElementById('emailInteresado');
                                const imgInteresado = document.getElementById('imgInteresado');
                                const fechaContacto = document.getElementById('fechaContacto');
                                const msgInteresado = document.getElementById('msgInteresado');
                                const asunto = document.getElementById('asunto');
                                const mail_lect = document.getElementById('mail-lect');
                                const no_mail = document.getElementById('no-mail');
                                const cerrarMail = document.getElementById('cerrarMail');

                                mail_lect.classList.remove('hidden');
                                mail_lect.classList.add('flex');
                                no_mail.classList.remove('flex');
                                no_mail.classList.add('hidden');

                                if (cerrarMail) {
                                    cerrarMail.addEventListener('click', function() {
                                        mail_lect.classList.remove('flex');
                                        mail_lect.classList.add('hidden');
                                        no_mail.classList.remove('hidden');
                                        no_mail.classList.add('flex');
                                        const anterior = document.querySelector(
                                            '.active');
                                        if (anterior) anterior.classList.remove(
                                            'active');
                                    });
                                }



                                let fullname = `${data.nombre} ${data.apellido}`;
                                nombreInteresado.textContent = fullname;
                                emailInteresado.textContent = data.email;

                                let iniciales = fullname.split(' ').map(function(word) {
                                    return word[0];
                                }).join('');

                                let urlImg =
                                    `https://ui-avatars.com/api/?name=${iniciales}&color=7F9CF5&background=EBF4FF`;
                                imgInteresado.src = urlImg;
                                asunto.textContent = data.asunto;
                                fechaContacto.textContent = data.fecha_enviado;
                                msgInteresado.textContent = data.mensaje;

                            })
                            .catch(error => {
                                console.error('Error al realizar la solicitud:', error);
                            });
                    });
                });
            });
        </script>
    @endsection
</x-app-layout>
