<x-app-layout>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button>logout</button>
    </form>
    <a href="{{ route('profile.edit') }}">profile</a>
    <h1>hello from home page</h1>
    {{ $user->cards }}
    {{ $user->services }}
</x-app-layout>
