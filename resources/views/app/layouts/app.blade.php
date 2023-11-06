<!doctype html>
<html lang="en" id="htmlMainPage">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
<script src="https://cdn.tailwindcss.com/3.3.0"></script>
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
<script>
  tailwind.config = {
    darkMode: ['class', '[data-mode="dark"]'],
    theme: {
      fontFamily: {
        sans: ["Roboto", "sans-serif"],
        body: ["Roboto", "sans-serif"],
        mono: ["ui-monospace", "monospace"],
      },
    },
    corePlugins: {
      preflight: false,
    },
  };
</script>
    <title>@yield('title') - {{config('app.name')}}</title>
</head>
<script>
    function lighMode() {
        console.log('executou');
        document.getElementById('htmlMainPage').classList.add('dark')
    }
</script>
<body class="antialiased">
<header>
    <!-- Main navigation container -->
<nav
class="flex-no-wrap relative flex w-full items-center justify-between bg-[#FBFBFB] py-2 shadow-md shadow-black/5 dark:bg-neutral-600 dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-4"
data-te-navbar-ref>
<div class="flex w-full flex-wrap items-center justify-between px-3">
  <!-- Collapsible navigation container -->
  <div
    class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
    id="navbarSupportedContent1"
    data-te-collapse-item>
    <!-- Logo -->
    <a
      class="mb-4 ml-2 mr-5 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"
      href="#">
      <img
        src="https://tecdn.b-cdn.net/img/logo/te-transparent-noshadows.webp"
        style="height: 15px"
        alt="TE Logo"
        loading="lazy" />
    </a>
    <!-- Left navigation links -->

    <ul
      class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row"
      data-te-navbar-nav-ref>
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <!-- Dashboard link -->
        <a
          class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-zinc-400"
          href="/"
          data-te-nav-link-ref
          >Dashboard</a
        >
      </li>
      <!-- Team link -->
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <a
          class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
          href="{{route('fornecedor.index')}}"
          data-te-nav-link-ref
          >Fornecedores</a
        >
      </li>
      <!-- Projects link -->
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <a
          class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
          href="{{route('servidor.index')}}"
          data-te-nav-link-ref
          >Servidores</a
        >
      </li>
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <a
          class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
          href="{{route('cargo.index')}}"
          data-te-nav-link-ref
          >Cargos</a
        >
      </li>
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <a
          class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
          href="{{route('usuario.index')}}"
          data-te-nav-link-ref
          >Usuários</a
        >
      </li>
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <a
          class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
          href="{{route('modelo-avaliacao.index')}}"
          data-te-nav-link-ref
          >Modelos de Avaliação</a
          >
      </li>
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <a
          class="text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
          href="{{route('equipe.index')}}"
          data-te-nav-link-ref
          >Equipes</a
        >
      </li>
      <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
        <label onclick="lighMode()" class="relative inline-flex items-center cursor-pointer">
            <input type="checkbox" value="" class="sr-only peer">
            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Dark mode</span>
          </label>
      </li>
    </ul>
  </div>
</div>
</nav>
</header>

<section class="container px-4 mx-auto">
    <head>
        <div class="mt-2" class="text-end align-content-end">
            @yield('breadcrumb')
        </div>
    </head>
    <head>
        <div class="mt-2">
            @yield('header')

        </div>
    </head>
    <div>
        <div class="mt-2">
            @yield('content')
        </div>
    </div>
    <footer>
        @yield('footer')
    </footer>
</section>
</body>
</html>
