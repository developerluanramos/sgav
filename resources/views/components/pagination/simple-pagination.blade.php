@if (isset($paginator))
    @php
        $queryParams = (isset($appends) && gettype($appends) === 'array') ? '&'.http_build_query($appends) : ''
    @endphp
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between mt-2">
        {{-- Previous Page Link --}}
        @if ($paginator->isFirstPage())
            <a type="button" class="text-white bg-blue-200 hover:bg-blue-200 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-200 dark:hover:bg-blue-200 dark:focus:ring-blue-200">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                </svg>
                  
                <span class="sr-only">Icon description</span>
            </a>
        @else
            <a href="?page={{$paginator->getNumberPreviousPage()}}{{$queryParams}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                </svg>
                <span class="sr-only">Icon description</span>
            </a>
        @endif

        {{-- Next Page Link --}}
        @if (!$paginator->isLastPage())
            <a href="?page={{$paginator->getNumberNextPage()}}{{$queryParams}}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                  </svg>
                  
                <span class="sr-only">Icon description</span>
            </a>
        @else
            <a type="button" class="text-white bg-blue-200 hover:bg-blue-200 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-200 dark:hover:bg-blue-200 dark:focus:ring-blue-200">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                  </svg>
                  
                <span class="sr-only">Icon description</span>
            </a>
        @endif
    </nav>
@endif
