<div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
    @if (isset($filters))
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div></div>

            {{ $filters }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            {{ $head }}
            </thead>
            <tbody>
            {{ $body }}
            </tbody>
        </table>
    </div>

    @if (isset($pagination))
        <div class="p-4">
            {{ $pagination }}
        </div>
    @endif
</div>
