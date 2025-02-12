<ol class="flex mt-6 items-center w-full text-sm font-medium text-center text-gray-500 dark:text-gray-400 sm:text-base">
    <li class="{{$step === \App\Enums\CicloAvaliativoStepsEnum::PERIODICIDADE ? 'text-blue-600' : 'text-green-600'}}
            flex md:w-full text-blue-600 items-center dark:text-blue-500 sm:after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            @if($step === \App\Enums\CicloAvaliativoStepsEnum::PERIODICIDADE)
                <span class="me-2">1</span>
            @else
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
            @endif
            <b>Periodicidade</b>
        </span>
    </li>
    <li class="{{$step != \App\Enums\CicloAvaliativoStepsEnum::INCIDENCIA && $step != \App\Enums\CicloAvaliativoStepsEnum::PERIODICIDADE  ? 'text-green-600' : null}}
               {{$step === \App\Enums\CicloAvaliativoStepsEnum::INCIDENCIA ? 'text-blue-600' : null}}
            flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            @if($step != \App\Enums\CicloAvaliativoStepsEnum::INCIDENCIA && $step != \App\Enums\CicloAvaliativoStepsEnum::PERIODICIDADE)
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
            @else
                <span class="me-2">2</span>
            @endif
            <b>Incidência</b>
        </span>
    </li>
    <li class="{{$step != \App\Enums\CicloAvaliativoStepsEnum::INCIDENCIA && $step != \App\Enums\CicloAvaliativoStepsEnum::PERIODICIDADE && $step !=  \App\Enums\CicloAvaliativoStepsEnum::TEMPLATE  ? 'text-green-600' : null}}
               {{$step === \App\Enums\CicloAvaliativoStepsEnum::TEMPLATE ? 'text-blue-600' : null}}
            flex md:w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-200 after:border-1 after:hidden sm:after:inline-block after:mx-6 xl:after:mx-10 dark:after:border-gray-700">
        <span class="flex items-center after:content-['/'] sm:after:hidden after:mx-2 after:text-gray-200 dark:after:text-gray-500">
            @if($step != \App\Enums\CicloAvaliativoStepsEnum::INCIDENCIA && $step != \App\Enums\CicloAvaliativoStepsEnum::PERIODICIDADE && $step !=  \App\Enums\CicloAvaliativoStepsEnum::TEMPLATE)
                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
            @else
                <span class="me-2">3</span>
            @endif
            <b>Templates</b>
        </span>
    </li>
    <li class="{{$step === \App\Enums\CicloAvaliativoStepsEnum::CONCLUSAO ? 'text-blue-600' : null}} flex items-center">
        <span class="me-2">4</span>
        <b>Conclusão</b>
    </li>
</ol>


{{--<svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">--}}
{{--    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>--}}
{{--</svg>--}}
