<div {{ $attributes->merge(['class' => 'mx-auto sm:px-6 lg:px-8']) }}>
    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
