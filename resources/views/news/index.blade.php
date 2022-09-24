@extends('dashboard')

@section('title') {{'Comunicados'}} @endsection

@section('content')
<div class="flex flex-col">

    @if ($message = Session::get('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
         role="alert">
        <span class="font-medium">{{ $message }}</span>
    </div>
    @endif

    @if (empty(count($news)))
  <div class="flex">
    <div>
      <p class="font-bold">Nenhum registro encontrado</p>
      <p class="text-sm">Crie um novo comunicado</p>
    </div>
  </div>
</div>
    @endif

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <tbody>
        @foreach ($news as $new)
        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
            <th scope="row" class="py-4 px-6 font-medium text-gray-900 dark:text-white">
                <p><b>{{ $new->title }}</b></p>

                <p>
                    {{ $new->description }}
                </p>
            </th>

            <td class="inline-grid justify-end">
                <a
                    href="{{ route('news.show',$new->id) }}"
                    class="text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </a>

                <a href="{{ route('news.edit', $new->id) }}"
                   class="text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                    </svg>

                </a>

                <form action="{{ route('news.destroy', $new->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            onclick="return confirm('Deseja excluir o comunicado?')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>

    <div class="flex justify-end mt-10 pb-3 pr-3 pt-3 text-gray-500">
        <a href="{{ route('news.create') }}"
           class="pt-2 px-6 py-2 text-sm font-semibold rounded-md shadow-md hover:bg-gray-100 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>

        </a>
    </div>

</div>

@endsection
