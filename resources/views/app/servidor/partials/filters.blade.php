<form class="mt-2" action="{{ route('servidor.index') }}">
    <x-layouts.inputs.input-search-list :filters="$filters" />
</form>
