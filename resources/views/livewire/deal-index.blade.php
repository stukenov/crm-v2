<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="w-full max-w-4xl p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-gray-900 mb-6">Список сделок</h2>
        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-200" wire:click="showDealFormModalFunction">Создать новую сделку</button>

        <div class="overflow-x-auto mt-6">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Название</th>
                        <th class="py-3 px-6 text-left">Клиент</th>
                        <th class="py-3 px-6 text-left">Сумма</th>
                        <th class="py-3 px-6 text-left">Статус</th>
                        <th class="py-3 px-6 text-left">Ответственный</th>
                        <th class="py-3 px-6 text-center">Действия</th>
                    </tr>
                </thead>
                <tbody class="text-gray-800 text-sm font-light">
                    @foreach($deals as $deal)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                <div class="flex items-center">
                                    <span class="font-medium">{{ $deal->title }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{ $deal->contact->first_name }} {{ $deal->contact->last_name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $deal->amount }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $deal->status }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $deal->assignedUser->name }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <a href="{{ route('deals.edit', $deal->id) }}" class="text-blue-600 hover:text-blue-800">Редактировать</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if ($showDealFormModal)
        <livewire:deal-form-modal :show="$showDealFormModal" :dealId="$dealId ?? null" wire:key="deal-form-modal"/>
    @endif
</div>
