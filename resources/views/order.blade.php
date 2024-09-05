<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            #{{ $order->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"
                    x-data = "{
                 dipatched: false,
                 delivered: false,
                 order: null,
                 }"
                    x-init="Echo.private('orders.{{ $order->id }}')
                        .listen('OrderDispatched', (e) => {
                            order = e.order;
                            dipatched = true;
                        })
                        .listen('OrderDelivered', (e) => {
                            order = e.order;
                            delivered = true;
                        })">
                    <template x-if="dipatched">
                        <div>
                            order (#<span x-text="order.id"></span>) hase been dispatced
                        </div>
                    </template>
                    <template x-if="delivered">
                        <div>
                            order (#<span x-text="order.id"></span>) hase been delivered
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
