@extends('dashboard')

@section('title', 'Edição de Animal')

@section('content')
<h1 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Editar Animal</h1>
<br>
@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div>
    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-1 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-2">
          
          <form action="{{ route('animals.update', $animal->id) }}" method="post">
            @csrf
            @method('put')
  
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
  
                    <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                    <input type="text" name="name" id="name" value="{{ $animal->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  
                  </div>
    
                  <div class="col-span-6 sm:col-span-3">
  
                    <label for="breed" class="block text-sm font-medium text-gray-700">Raça</label>
                    <input type="text" name="breed" id="breed" value="{{ $animal->breed }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
  
                  </div>
  
                  <div class="col-span-6 sm:col-span-3">
  
                      <label for="type" class="block text-sm font-medium text-gray-700">Espécie</label>
                      <input type="text" name="type" id="type" placeholder="Espécie" value="{{ $animal->type }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    
                    </div>
    
                  <div class="col-span-6 sm:col-span-3">
                      
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gênero</label>
                    <select name="gender" id="gender" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      @foreach ($genders as $gender)
                          <option value="{{ $gender }}" {{ $animal->gender == $gender ? 'selected' : ''}}>{{ $gender }}</option>
                      @endforeach
                    </select>
  
                  </div>
  
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <a href="{{ route('animals.index') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Voltar
                </a>
                
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Salvar
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>  
  </div>
@endsection