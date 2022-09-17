@extends('dashboard')

@section('title') {{'Comunicados - Visualizar'}} @endsection

@section('content')

<div class="max-w-4xl mx-auto mt-8">

    <div class="mb-4">
        <div class="flex justify-end mt-5">
            <a class="px-2 py-1 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600" href="{{ route('news.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/>
                </svg>

            </a>
        </div>
    </div>

    <div class="flex flex-col mt-5">
        <div class="flex flex-col">
            <div
                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

                    <form action="#">
                        <div>
                            <label class="block text-sm font-bold text-gray-700" for="title">Título:</label>
                            <input disabled="disabled" readonly type="text" name="title" value="{{ $news->title }}"
                                   class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                   placeholder="Title">
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-bold text-gray-700" for="title">Descrição:</label>
                            <textarea disabled="disabled" readonly
                                      class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                      name="description" placeholder="Body">{{ $news->description }}</textarea>
                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-bold text-gray-700" for="title">Criado em:</label>
                            <input
                                value="{{ \Carbon\Carbon::parse($news->created_at)->format('d/m/Y H:m:i')}}"
                                disabled="disabled"
                                readonly
                                type="text"
                                name="title"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="Title">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
