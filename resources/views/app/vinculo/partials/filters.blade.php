<form class="mt-2" action="{{ route('vinculo.index') }}">
    <x-layouts.inputs.input-search-list :filters="$filters" />
</form>
