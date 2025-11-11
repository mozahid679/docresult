<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('ফলাফল') }}</h1>
        <p class="mt-1 text-gray-600 dark:text-gray-400">{{ __(' ফলাফল পেইজে স্বাগতম') }}</p>
    </div>

    <div class="mb-6 bg-gradient-to-b from-blue-50 to-white">
        <div class="h-7xl flex flex-col items-center justify-center bg-gradient-to-b from-blue-50 to-white px-4 py-10">
            <div class="w-full max-w-md rounded-2xl bg-white p-4 text-center shadow-lg ring-1 ring-gray-100">
                <h2 class="mb-1 text-xl font-bold text-blue-700">স্বাগতম - স্বাস্থ্য শিক্ষা অধিদপ্তরে</h2>
                <h3 class="mb-2 text-base font-medium text-gray-800">প্রশিক্ষণ কোর্সে ভর্তি পরীক্ষার ফলাফল</h3>
                <p class="mb-8 text-sm text-gray-500">রোল নম্বর লিখে আপনার ফলাফল দেখুন</p>

                <div class="mb-8 flex flex-col items-center justify-center gap-2">
                    <form class="mb-6 flex justify-center gap-2" action="{{ route('results.search') }}" method="POST">
                        @csrf
                        <input
                            class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-black shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400"
                            name="roll" type="text" value="{{ old('roll') }}" placeholder="রোল নম্বর লিখুন...">
                        <button
                            class="whitespace-nowrap rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition-all hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 active:scale-[0.98]">ফলাফল
                            দেখুন</button>
                    </form>

                    @if (isset($result))
                        <div class="relative rounded-lg border border-green-200 bg-green-50 p-4 text-center text-black shadow-sm transition-all duration-300"
                            id="result-container">
                            <!-- Close Button -->
                            <button
                                class="absolute right-2 top-2 rounded-full p-1 text-gray-400 transition-all hover:bg-green-100 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-green-300"
                                onclick="hideResult()">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>

                            <!-- Result Content -->
                            <div class="pr-6">
                                <p class="text-lg font-semibold text-green-800">{{ $result->fullName }}</p>
                                <div class="mt-2 space-y-1 text-sm text-green-700">
                                    <p>রোল: {{ $result->roll }}</p>
                                    <p>লিঙ্গ: {{ $result->Gender }}</p>
                                    <p>মেধা স্থান: {{ $result->meritPosition }}</p>
                                    <p>প্রতিষ্ঠান: {{ $result->allocatedInstituteName }}</p>
                                    <p>স্ট্যাটাস: <span class="font-medium">{{ $result->allocationStatus }}</span></p>
                                </div>
                            </div>
                        </div>
                    @elseif(request()->isMethod('post'))
                        <div class="relative rounded-lg border border-red-200 bg-red-50 p-4 text-center text-red-700 shadow-sm transition-all duration-300"
                            id="error-message">
                            <button
                                class="absolute right-2 top-2 rounded-full p-1 text-red-400 transition-all hover:bg-red-100 hover:text-red-600 focus:outline-none focus:ring-2 focus:ring-red-300"
                                onclick="hideResult()">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            <p class="pr-6 font-medium">কোন ফলাফল পাওয়া যায়নি</p>
                        </div>
                    @endif
                </div>

                <script>
                    // Auto hide after 8 seconds
                    setTimeout(() => {
                        hideResult();
                    }, 8000);

                    function hideResult() {
                        const resultContainer = document.getElementById('result-container');
                        const errorMessage = document.getElementById('error-message');

                        if (resultContainer) {
                            resultContainer.style.opacity = '0';
                            resultContainer.style.transform = 'translateY(-10px)';
                            setTimeout(() => resultContainer.remove(), 300);
                        }

                        if (errorMessage) {
                            errorMessage.style.opacity = '0';
                            errorMessage.style.transform = 'translateY(-10px)';
                            setTimeout(() => errorMessage.remove(), 300);
                        }
                    }

                    // Also hide when pressing Escape key
                    document.addEventListener('keydown', (e) => {
                        if (e.key === 'Escape') {
                            hideResult();
                        }

                        if (window.history.pushState) {
                            window.history.pushState({}, '', '{{ route('results.searchForm') }}');
                        }
                    });
                </script>

                <div class="mt-6 grid grid-cols-3 gap-4">
                    <div class="rounded-xl bg-blue-50 py-4 shadow-sm">
                        <p class="text-3xl font-bold text-gray-800">{{ number_format($total) }}</p>
                        <p class="text-sm font-medium text-gray-600">মোট শিক্ষার্থী</p>
                    </div>
                    <div class="rounded-xl bg-green-50 py-4 shadow-sm">
                        <p class="text-3xl font-bold text-gray-800">{{ number_format($male) }}</p>
                        <p class="text-sm font-medium text-gray-600">ছেলে</p>
                    </div>
                    <div class="rounded-xl bg-pink-50 py-4 shadow-sm">
                        <p class="text-3xl font-bold text-gray-800">{{ number_format($female) }}</p>
                        <p class="text-sm font-medium text-gray-600">মেয়ে</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
