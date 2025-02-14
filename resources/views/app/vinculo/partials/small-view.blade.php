<div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
    <h5 class="flex mb-2 text-1xl font-bold text-gray-900 dark:text-white">
        <span class="mt-1">{{$vinculo->matricula}} - {{$vinculo->nome}}</span>
    </h5>
    <p class="flex mb-3 font-normal text-gray-500 dark:text-gray-400">
        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-indigo-900 dark:text-indigo-300">
            <small>{{$vinculo->nome_orgao}}</small>
        </span>
        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-indigo-900 dark:text-indigo-300">
            {{$vinculo->nome_local_trabalho}}
        </span>
        <span class="bg-indigo-100 text-indigo-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-indigo-900 dark:text-indigo-300">
            {{$vinculo->nome_funcao}}
        </span>
    </p>
</div>