<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Individual posting
        </h2>

        <x-message :message="session('message')" />

    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <div class="px-10 mt-4">

                <div class="bg-white w-full  rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                    <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">
                                {{ $board->title }}
                            </h1>
                            <hr class="w-full">
                    </div>
                    <div class="flex justify-end mt-4">
                        <a href="{{route('board.edit', $board)}}"><x-primary-button class="bg-teal-700 float-right">edit</x-primary-button></a>
                        <form method="post" action="{{route('board.destroy', $board)}}">
                            @csrf
                            @method('delete')
                            <x-primary-button class="bg-red-700 float-right ml-4" onClick="return confirm('Do u really want to delete it?');">delete</x-primary-button>
                        </form>
                    </div>
                    <div>
                        <p class="mt-4 text-gray-600 py-4">{{$board->body}}</p>
                        @if($board->image)
                            <div>
                                (Image File：{{$board->image}})
                            </div>
                            <img src="{{ asset('storage/images/'.$board->image)}}" class="mx-auto" style="height:300px;">
                        @endif
                        <div class="text-sm font-semibold flex flex-row-reverse">
                            <p> {{ $board->user->name }} • {{$board->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>