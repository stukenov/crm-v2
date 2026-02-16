<div class="fixed inset-0 flex items-center justify-center z-50 overflow-y-auto">
    <div class="fixed inset-0 bg-black opacity-50"></div>
    <div class="bg-white p-8 rounded-lg shadow-lg z-10 max-w-lg w-full">
        <h2 class="text-2xl font-semibold mb-6 text-center">{{ $dealId ? 'Редактировать сделку' : 'Создать новую сделку' }}</h2>

        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="save">
            <div class="mb-6">
                <label for="title" class="block text-gray-700 mb-2">Название сделки:</label>
                <input type="text" id="title" wire:model="deal.title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
                @error('deal.title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="block text-gray-700 mb-2">Описание:</label>
                <textarea id="description" wire:model="deal.description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500"></textarea>
                @error('deal.description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label for="amount" class="block text-gray-700 mb-2">Сумма:</label>
                <input type="number" id="amount" wire:model="deal.amount" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
                @error('deal.amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label for="status" class="block text-gray-700 mb-2">Статус:</label>
                <select id="status" wire:model="deal.status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
                    <option value="">Выберите статус</option>
                    <option value="lead">Lead</option>
                    <option value="proposal">Proposal</option>
                    <option value="negotiation">Negotiation</option>
                    <option value="closed_won">Closed Won</option>
                    <option value="closed_lost">Closed Lost</option>
                </select>
                @error('deal.status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label for="contact_id" class="block text-gray-700 mb-2">Клиент:</label>
                <select id="contact_id" wire:model="deal.contact_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
                    <option value="">Выберите клиента</option>
                    @foreach($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->first_name }} {{ $contact->last_name }}</option>
                    @endforeach
                </select>
                @error('deal.contact_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-6">
                <label for="assigned_to" class="block text-gray-700 mb-2">Ответственный:</label>
                <select id="assigned_to" wire:model="deal.assigned_to" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
                    <option value="">Выберите ответственного</option>   
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('deal.assigned_to') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-between space-x-4">
                <button type="button" wire:click="closeDealFormModalFunction" class="w-full px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-200">Отменить</button>
                <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-200">Сохранить</button>
            </div>
        </form>
    </div>
</div>
