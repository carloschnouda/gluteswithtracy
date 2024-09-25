<div class="w-full max-w-sm">
    <div class="my-4">
        <img class="m-auto h-[200px] w-[200px]" src="{{ Storage::url($service['icon']) }}" alt="">
    </div>

    <div class="my-4 text-center text-2xl font-bold text-gray-600">
        {{ $service['title'] }}
    </div>

    <div class="text-md text-center text-gray-500">
        {!! $service['description'] !!}
    </div>

</div>
