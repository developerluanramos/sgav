<form class="mt-2" action="{{ route('avaliador.index') }}">
    <x-layouts.inputs.input-search-list :filters="$filters" />
</form>