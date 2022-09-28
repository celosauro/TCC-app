@extends('dashboard')

@section('title') {{'Home'}} @endsection

@section('content')
<div class="flex flex-col">

    @if ($message = Session::get('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
         role="alert">
        <span class="font-medium">{{ $message }}</span>
    </div>
    @endif

    @if (empty(count($activities)))
    <div class="flex">
        <div>
            <p class="font-bold">Nenhuma atividade para hoje</p>
            <p class="text-sm">
                Clique <a href="{{ route('activities.index') }}" class="underline">aqui</a> para visualizar as atividades programadas
            </p>
        </div>
    </div>
</div>
@endif

<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <tbody>
    @foreach ($activities as $activity)
    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
        <th scope="row" class="py-4 px-6 font-medium text-gray-900 dark:text-white">
            <p class="font-bold">{{ $activity->title }}</p>

            <p>
                {{ $activity->description }}
            </p>
        </th>
    </tr>
    @endforeach

    </tbody>
</table>

</div>

@endsection
