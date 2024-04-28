<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-4">
                    <form method="GET" action="{{ route('dashboard') }}">
                        <select class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-gray-500" name="recepient" onchange="this.form.submit()">
                            <option>Select a recepient</option>
                            @foreach ($users as $i => $user)
                                <option value="{{ $user->id }}" {{ $recepient == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </form>
                    <br/>
                    <div class="chat-box">
                        @foreach ($messages as $message)
                            <div class="chat-message">
                                <div class="flex items-center mb-1">
                                    <div class="flex-shrink-0 mr-2">
                                        {{ $message->sender->name }}
                                    </div>
                                    <div class="bg-blue-500 text-white rounded-lg p-2">
                                        <div class="chat-message-received flex mb-1">
                                            <div class="bg-blue-500 text-white rounded-lg p-2">
                                                {{ $message->text }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <form class="flex mt-4" method="POST" action="{{ route('messages.store') }}">
                        @csrf
                        <input hidden name="recepient" value="{{ $recepient }}" />
                       
                        <textarea name="text" placeholder="Type your message..." class="flex-1 p-2 rounded-l border border-gray-300 focus:outline-none focus:ring focus:border-blue-300"></textarea>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-r">Send</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    
      
</x-app-layout>
