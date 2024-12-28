<div class="w-full max-w-sm" animate style="transition-delay: {{ $index * 0.5 }}s">
    <div class="my-4">
        <img class="m-auto aspect-square h-[120px] w-[120px] object-contain" src="{{ Storage::url($service['icon']) }}"
            alt="">
    </div>

    <div class="my-4 text-center text-2xl font-bold text-gray-600">
        {{ $service['title'] }}
    </div>

    <div class="text-md text-center text-gray-500">
        {!! $service['description'] !!}
    </div>

</div>
