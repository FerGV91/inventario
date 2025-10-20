<x-admin-layout
    title="Ventas"
    :breadcrumbs="[
        [
            'name' => 'Dashboard',
            'href' => route('admin.dashboard'),
        ],
        [
            'name' => 'Ventas'
        ] 
    ]">

    @can('create-sales')
    <x-slot name="action">
        <x-wire-button href="{{route('admin.sales.create')}}" blue>
            Nuevo
        </x-wire-button>
    </x-slot>
    @endcan

    @livewire('admin.datatables.sale-table')

</x-admin-layout>