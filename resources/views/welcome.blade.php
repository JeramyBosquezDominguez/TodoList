<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">-->
        <!--<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />-->

        <!-- Styles -->
        @vite("resources/css/app.css")

    </head>
    <body class="antialiased">

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <div class="flex flex-col w-full sm:max-w-md text-center items-center">
                <image class="w-36" src="{{ asset("images/todo_logo.png") }}" />
                <h1 class="text-3xl font-extrabold font-mono uppercase mt-4">@lang("todolist.app_name")</h1>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    {{-- Email: nathanael92@yahoo.com --}}
                    <x-todo-input-label for="email" class="text-xl"  :value="__('Email')" />
                    <x-todo-input-text  id="email" class="block mt-1 w-full"
                                        name="email" type="email" :value="old('email')" autocomplete="off"
                                        autofocus required />

                    {{-- Contraseña --}}
                    <x-todo-input-label for="password" class="text-xl mt-4" :value="__('Password')" />
                    <x-todo-input-text  id="password" class="block mt-1 w-full"
                                        name="password" type="password" autofocus required />

                    {{-- Mensaje de error --}}
                    <x-todo-input-error :messages="$errors->all()" />

                    {{-- Botón de envío --}}
                    <x-todo-button-primary class="mt-4 mb-10 w-full h-14 justify-center" value="Enviar" />

                </form>
            </div>
        </div>


    </body>
</html>
