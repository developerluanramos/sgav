<form action="{{route('item-conceito-avaliacao.update', ["uuid" => $item->uuid])}}" method="POST" >
    {{ $item->uuid }}
    @csrf
    @method('PUT')
        <div class="flex flex-wrap -mx-3 mb-2">
            <x-layouts.inputs.input-array-text
                    label="Item"
                    name="nome"
                    lenght="6/12"
                    :value="$item->nome ?? old('nome')"
                />
                <x-layouts.inputs.input-normal-number
                    label="Pontuação"
                    name="pontuacao"
                    lenght="2/12"
                    :value="$item->pontuacao ?? old('pontuacao')"
                />
            <x-layouts.buttons.submit-with-icon-button class="w-full md:w-2/12" text="Salvar"/>
        </div>
</form>
