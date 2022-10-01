@extends('dashboard')

@section('title') {{'Comunicados - Editar'}} @endsection

@section('content')

<div class="max-w-4xl mx-auto mt-8">

    <div class="mb-4">
        <div class="flex justify-end mt-5">
            <a class="px-2 py-1 rounded-md bg-gray-100 text-gray-500 hover:bg-gray-900"
               href="{{ route('activities.index') }}">
                <svg role="img" aria-label="Voltar"
                     xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="1.5"
                     stroke="currentColor"
                     class="w-6 h-6">
                    <title>Voltar</title>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/>
                </svg>

            </a>
        </div>
    </div>

    <div class="flex flex-col mt-5">
        <div class="flex flex-col">
            <div
                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                @if ($errors->any())
                <div class="p-5 rounded bg-red-500 text-white m-3">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

                    <form action="{{ route('news.update',$news->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-bold text-gray-700" for="title">Título:</label>
                            <input type="text" name="title" value="{{ $news->title }}"
                                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   placeholder="Title">
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-bold text-gray-700" for="title">Descrição:</label>
                            <textarea
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="description" placeholder="Body">{{ $news->description }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4 gap-x-2">
                            <button type="submit"
                                    class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-gray-100 bg-gray-500 hover:bg-gray-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                Editar
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
