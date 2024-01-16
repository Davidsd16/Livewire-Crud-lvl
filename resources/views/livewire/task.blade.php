<div>
    <form class="p-4" wire:submit.prevent="save" wire:loading.remove>
        <div class="mb-4">
            <input wire:model.defer="task.text" class="p-2 bg-gray-200 w-full" type="text" placeholder="Tarea...">
            @error('task.text')
                <div class="mt-1 text-red-600 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>    
        <button type="submit" class="bg-indigo-700 text-white font-bold w-full rounded shadow p-2">Guardar</button>
    </form>
    
    @if (session()->has('message'))
        <h3 class="bg-blue-400 font-bold mb-4 p-2 rounded text-center text-sm text-white">{{ session('message') }}</h3>
    @endif

    <table class="shadow-md">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                <th class="py-3 px-6 text-left">Hecha</th>
                <th class="py-3 px-6 text-left">Tarea</th>
                <th class="py-3 px-6 text-left">&nbsp;</th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            @forelse($tasks as $task)
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2"><input type="checkbox"></td>
                    <td class="px-4 py-2">{{  $task->text }}</td>
                    <td class="px-4 py-2">
                        <button type="button" class="bg-indigo-400 px-2 py-1 text-white text-xs rounded">Editar</button>
                        <button type="button" class="bg-red-500 px-2 py-1 text-white text-xs rounded">Eliminar</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center py-4">No existen tareas para mostrar</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
