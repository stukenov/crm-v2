<div class="container mx-auto p-4">
    <form wire:submit.prevent="save" class="space-y-6">
        <div class="form-group">
            <label for="group_name" class="block text-sm font-medium text-gray-700">Group Name</label>
            <input type="text" wire:model="group_name" id="group_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            @error('group_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea wire:model="description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save Group</button>
    </form>

    <h3 class="mt-5 text-lg font-medium text-gray-900">Contact Groups</h3>
    <div class="overflow-x-auto mt-6">
        <table class="min-w-full bg-white rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Group Name</th>
                    <th class="py-3 px-6 text-left">Description</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($groups as $group)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-150 ease-in-out">
                        <td class="py-3 px-6 text-left whitespace-nowrap">{{ $group->group_name }}</td>
                        <td class="py-3 px-6 text-left">{{ $group->description }}</td>
                        <td class="py-3 px-6 text-center">
                            <button wire:click="edit({{ $group->id }})" class="bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">Edit</button>
                            <button wire:click="delete({{ $group->id }})" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
