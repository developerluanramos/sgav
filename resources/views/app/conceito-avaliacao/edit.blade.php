@extends('app.layouts.app')

@section('breadcrumb')
    {{ Breadcrumbs::render('conceito-avaliacao.edit', $conceitoAvaliacao) }}
@endsection

@section('title', 'Edição Conceito de Avaliação')

<x-layouts.headers.edit-header :title="$conceitoAvaliacao->uuid.' - '.$conceitoAvaliacao->descricao"/>

@section('content')

@include('components.alerts.form-errors')

<form action="{{route('conceito-avaliacao.update', $conceitoAvaliacao->uuid)}}" method="POST">
    @csrf
    @method('PUT')
    @include('app.conceito-avaliacao.partials.form-edit', ["conceitoAvaliacao" => $conceitoAvaliacao])
</form>

<ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    @foreach($conceitoAvaliacao->itensConceitosAvaliacao as $item)
        <li class="w-full flex px-4 py-2 border-b border-gray-200 rounded-t-lg dark:border-gray-600">
            <span>
                {{ $item->uuid }} - {{ $item->nome }} - {{ $item->pontuacao }}
            </span>

            <div class="flex ml-auto items-center">
                    <x-layouts.modals.simple-modal
                        :titulo="'EDIÇÃO DE ITEM'"
                        :sessao="'modal-content-item-conceito-avaliacao'.$item->uuid"
                        :identificador="'modalItemConceitoAvaliacao'.$item->uuid"
                        >
                        @section('modal-content-item-conceito-avaliacao'.$item->uuid)
                            @include('app.conceito-avaliacao.item-conceito-avaliacao.partials.form', ["itemConceitoAvaliacao" => $item])
                        @endsection
                    </x-layouts.modals.simple-modal>
                    <x-layouts.buttons.edit-action-button
                        :identificador="'modalItemConceitoAvaliacao'.$item->uuid"
                        color="primary"
                    />
            <div class="m-1"></div>
            <x-layouts.buttons.action-button
                text="Excluir"
                action="excluir"
                color="danger"
                :identificador="'drawer-delete-confirmacao'.$item->uuid"
                :route="route('item-conceito-avaliacao.delete', [
                    'uuid' => $item->uuid
                ])"
            />
            </div>
        </li>
    @endforeach
</ul>

@endsection
