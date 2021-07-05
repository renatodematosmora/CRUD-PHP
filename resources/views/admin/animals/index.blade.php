@extends('dashboard')

@section('title', 'Lista de Animais')

@section('content')

<div class="overflow-hidden inline-flex">
    <div class="px-4 py-3 text-left sm:px-6">
        <h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Lista de Animais</h1> 
    </div>
    <div class="px-4 py-3 text-right sm:px-6">
        <a href="{{ route('animals.create') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cadastrar Animal</a>
    </div>
</div>
<br>
<br>
<div>
    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-1 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
        
            <form action="{{ route('animals.search') }}" method="post">
                @csrf

                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                      <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
        
                            <input type="text" name="searchName" placeholder="Filtrar por nome:" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        
                        </div>

                        <div class="col-span-6 sm:col-span-3">
        
                            <input type="text" name="searchBreed" placeholder="Filtrar por raça:" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          
                        </div>

                        <div class="col-span-6 sm:col-span-3">
        
                            <input type="text" name="searchType" placeholder="Filtrar por espécie:" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          
                        </div>
                      </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Filtrar
                        </button>
                    </div>
                </div>
            </form>

        </div>
      </div>
    </div>
</div>

<br>
<br>

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Raça</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Espécie</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gênero</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                <th scope="col" class="relative px-6 py-3">Ações</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($animals as $animal)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $animal->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $animal->breed }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $animal->type }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $animal->gender }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $animal->active == 1 ? 'Ativo' : 'Inativo' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('animals.edit', $animal->id) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">Editar</a>
                            <a href="{{ route('animals.changeStatus', $animal->id) }}" class="{{ $animal->active == 0 ? 'class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500"' : 'class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"' }}">{{ $animal->active == 0 ? 'Ativar' : 'Desativar' }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@if (isset($filters))
    {{ $animals->appends($filters)->links() }}
@else
    {{ $animals->links() }}
@endif

@endsection