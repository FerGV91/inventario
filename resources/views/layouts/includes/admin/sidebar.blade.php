@php
$links = [
    [
        'header' => 'Principal'
    ],
    [
        'name'=> 'Dashboard',
        'icon'=> 'fa-solid fa-gauge',
        'href'=> route('admin.dashboard'),
        'active'=> request()->routeIs('admin.dashboard'),
    ],
    [
        'name' => 'Inventario',
        'icon' => 'fa-solid fa-boxes-stacked',
        'active' => request()->routeIs([
            'admin.categories.*', 
            'admin.products.*', 
            'admin.warehouses.*']),
        'submenu' => [
            [
                'name'=> 'Categorias',
                'icon'=> 'fa-solid fa-list',
                'href'=> route('admin.categories.index'),
                'active'=> request()->routeIs('admin.categories.*'),
            ],
            [
                'name'=> 'Productos',
                'icon'=> 'fa-solid fa-box',
                'href'=> route('admin.products.index'),
                'active'=> request()->routeIs('admin.products.*'),
            ],
            [
                'name'=> 'Almacenes',
                'icon'=> 'fa-solid fa-warehouse',
                'href'=> route('admin.warehouses.index'),
                'active'=> request()->routeIs('admin.warehouses.*'),
            ],
        ]
    ],
    
    [
        'name'=> 'Compras',
        'icon'=> 'fa-solid fa-cart-shopping',
        'active' => request()->routeIs([
            'admin.suppliers.*',
            'admin.purchase-orders.*',
            'admin.purchases.*'
        ]),
        'submenu' => [
            [
                'name'=> 'Proveedores',
                'href'=> route('admin.suppliers.index'),
                'active'=> request()->routeIs('admin.suppliers.*'),
            ],
            [
                'name'=> 'Ordenes de Compra',
                'href'=> route('admin.purchase-orders.index'),
                'active'=> request()->routeIs('admin.purchase-orders.*'),
            ],
            [
                'name'=> 'Compras',
                'href'=> route('admin.purchases.index'),
                'active'=> request()->routeIs('admin.purchases.*'),
            ],
        ]
    ],

    [
        'name'=> 'Ventas',
        'icon'=> 'fa-solid fa-cash-register',
        'active' => request()->routeIs([
            'admin.customers.*',
            'admin.quotes.*',
            'admin.sales.*'
        ]),
        'submenu' => [
            [
                'name'=> 'Clientes',
                'href'=> route('admin.customers.index'),
                'active'=> request()->routeIs('admin.customers.*'),
         ],
            [
                'name'=> 'Cotizaciones',
                'href'=> route('admin.quotes.index'),
                'active'=> request()->routeIs('admin.quotes.*'),
            ],
            [
                'name'=> 'Ventas',
                'href'=> route('admin.sales.index'),
                'active'=> request()->routeIs('admin.sales.*'),
            ],
        ]
    ],
    [
        'name'=> 'Movimientos',
        'icon'=> 'fa-solid fa-arrows-rotate',
        'href'=> '',
        'active'=> request()->routeIs([
            'admin.movements.*',
            'admin.transfers.*'
        ]),
        'submenu' => [
            [
                'name'=> 'Entradas y Salidas',
                'href'=> route('admin.movements.index'),
                'active'=> request()->routeIs('admin.movements.*'),
            ],
            [
                'name'=> 'Transferencias',
                'href'=> route('admin.transfers.index'),
                'active'=> request()->routeIs('admin.transfers.*'),
            ],
        ]
    ],
    [
        'name'=> 'Reportes',
        'icon'=> 'fa-solid fa-chart-line',
        'active'=> request()->routeIs([
            'admin.reports.top-products',
            'admin.reports.low-stock',
            'admin.reports.top-customers',
        ]),
        'submenu' => [
            [
                'name'=> 'Productos mas vendidos',
                'href'=> route('admin.reports.top-products'),
                'active'=> request()->routeIs('admin.reports.top-products'),
            ],
            [
                'name'=> 'Bajo Stock',
                'href'=> route('admin.reports.low-stock'),
                'active'=> request()->routeIs('admin.reports.low-stock'),
            ],
            [
                'name'=> 'Clientes mas frecuentes',
                'href'=> route('admin.reports.top-customers'),
                'active'=> request()->routeIs('admin.reports.top-customers'),
            ],
        ]
    ],
    [
        'header' => 'Configuración'
    ],
    [
        'name'=> 'Usuarios',
        'icon'=> 'fa-solid fa-users',
        'href'=> route('admin.users.index'),
        'active'=> request()->routeIs('admin.users.*'),
    ],
    [
        'name'=> 'Roles',
        'icon'=> 'fa-solid fa-shield-halved',
        'href'=> route('admin.roles.index'),
        'active'=> request()->routeIs('admin.roles.*'),
    ],
    [
        'name'=> 'Ajustes',
        'icon'=> 'fa-solid fa-gear',
        'href'=> '',
        'active'=> false,
    ],
];
@endphp

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                @isset($link['header'])
                    <div class="px-2 py-2 text-xs font-semibold text-gray-500 uppercase">
                        {{ $link['header'] }}
                    </div>
                @else
                    <li>
                        @if(isset($link['submenu']))
                            <div x-data="{ 
                             open: {{ $link['active'] ? 'true' : 'false' }}
                            }">
                                <button 
                                    @click="open = !open"
                                    type="button" 
                                    class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                    <span class="w-6 h-6 inline-flex justify-center items-center text-gray-500">
                                        <i class="{{ $link['icon'] }}"></i>
                                    </span>
                                    <span class="ms-3 flex-1 text-left rtl:text-right whitespace-nowrap">{{ $link['name'] }}</span>
                                    <!-- <svg class="w-3 h-3 ml-auto" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg> -->
                                    <i class="text-sm" :class="{
                                    'fa-solid fa-chevron-up': open,
                                    'fa-solid fa-chevron-down': !open}">
                                    </i>
                                </button>
                                <ul x-show="open" x-cloak class="py-2 space-y-2">
                                    @foreach ($link['submenu'] as $item)
                                        <li>
                                            <a href="{{ $item['href'] }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ $item['active'] ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                                {{ $item['name'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <a href="{{ $link['href'] }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group {{ $link['active'] ? 'bg-gray-100 dark:bg-gray-700' : '' }}">
                                <span class="w-6 h-6 inline-flex justify-center items-center text-gray-500">
                                    <i class="{{ $link['icon'] }}"></i>
                                </span>
                                <span class="ms-3">{{ $link['name'] }}</span>
                            </a>
                        @endif
                    </li>
                @endisset
            @endforeach
        </ul>
    </div>
</aside>
