<!-- resources/views/components/layouts/tables/simple-table.blade.php -->
{{--
<style>
    .styled-table {
        border-collapse: collapse;
        margin: 6px 0;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .styled-table thead tr {
        background-color: rgb(59, 113, 202);
        color: #ffffff;
        text-align: left;
    }

    .styled-table th,
    .styled-table td {
        padding: 5px 5px 5px 5px;
    }

    .styled-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .styled-table tbody tr:last-of-type {
        border-bottom: 2px solid rgb(59, 113, 202);
    }

    .styled-table tbody tr.active-row {
        font-weight: bold;
        color: rgb(59, 113, 202);
    }
</style> --}}

<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table style="width: 100%;" class="table-auto min-w-full text-left text-sm font-light styled-table">
                    <thead>
                        <tr>
                            @foreach ($headers as $header)
                                <th>{{ $header }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @yield('table-content')
                    </tbody>
                </table>
                @isset($paginator, $appends)
                    <x-pagination.simple-pagination :paginator="$paginator" :appends="$appends" />
                @endisset
            </div>
        </div>
    </div>
</div>
