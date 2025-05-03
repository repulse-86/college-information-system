<header class="w-full bg-white">
    <div class="max-w-screen-xl px-4 py-3 flex justify-between items-center">
        <nav class="justify-between items-center space-x-4">
            @foreach($links as $link)
                <a href="{{ route($link['route']) }}" class="hover:text-gray-300">{{ $link['label'] }}</a>
            @endforeach
        </nav>
    </div>
</header>
