<div {{ $attributes->merge(['class' => 'py-4']) }}>
    &copy; {{ date('Y') }} {{ $companyName ?? config('app.name') }}. All rights reserved.
</div>
