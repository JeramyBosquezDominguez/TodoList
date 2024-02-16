<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>


    <form action="{{ route('actualizar') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">

                        <img src="{{ asset('imagenes/batman.jpg') }}" />

                        {{-- FOTO DE PERFIL --}}
                        <x-todo-input-label for="foto" value="Foto de perfil: " />
                        <x-todo-input-text type="file" id="foto" name="foto" />

                        <br/>

                        {{-- DIRECCIÓN DE EMAIL: nathanael92@yahoo.com --}}
                        <x-todo-input-label for="email" value="Dirección de correo: " />
                        <x-todo-input-text type="email" id="email" name="email" :value="old('email')" required />

                        {{-- NOMBRE --}}
                        <x-todo-input-label for="nombre" value="Nombre: " />
                        <x-todo-input-text type="text" id="nombre" name="nombre" :value="old('nombre')" required />

                         {{-- CONTRASEÑA --}}
                         <x-todo-input-label for="password" value="Contraseña: " />
                         <x-todo-input-text type="text" id="password" name="password" />

                         {{-- NÚMERO DE TELEFONO --}}
                         <x-todo-input-label for="telefono" value="Número de teléfono: " />
                         <x-todo-input-text type="phone" id="telefono" name="telefono" />

                         {{-- PERFIL DE TWITTER: @miperfildetwitter --}}
                         <x-todo-input-label for="twitter" value="Perfil de X (Twitter): " />
                         <x-todo-input-text type="text" id="twitter" name="twitter" :value="old('twitter')" />

                         <br/>

                         <x-todo-input-error :messages="$errors->all()" />


                          <br/>

                         <x-todo-button-primary>Enviar</x-todo-button-primary>

                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">

                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">

                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
