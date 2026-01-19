<x-header />
<div class="container w-full">
    <main class="flex flex-col items-center justify-center bg-gradient-to-b from-blue-50 to-white">
        <div
            class="lg:min-w-7xl md:min-w-5xl w-full rounded-2xl bg-white text-center shadow-lg ring-1 ring-gray-100 lg:p-12">
            <h2 class="mb-1 text-xl font-bold text-blue-700">স্বাগতম - স্বাস্থ্য শিক্ষা অধিদপ্তরে</h2>
            <h3 class="mb-2 text-base font-medium text-gray-800">প্রশিক্ষণ কোর্সে ভর্তি পরীক্ষার ফলাফল</h3>
            <p class="text-md mb-6 text-gray-500">রোল নম্বর লিখে আপনার ফলাফল দেখুন</p>

            <div class="mb-4 flex flex-col items-center justify-center gap-2">
                <form class="mb-6 flex justify-center gap-2" action="{{ route('home') }}" method="GET">
                    <input
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm text-black shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        name="roll" type="text" value=" " placeholder="রোল নম্বর লিখুন...">
                    <button
                        class="whitespace-nowrap rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition-all hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 active:scale-[0.98]">
                        ফলাফল দেখুন
                    </button>
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
                        <div class="p-4">
                            <div class="flex items-center justify-around">
                                <div class="flex flex-col items-start">
                                    <p class="text-lg font-semibold text-green-800">{{ $result->fullName }}</p>
                                    <p>রোল: {{ $result->roll }}</p>
                                    <p>ফর্ম সিরিয়াল: {{ $result->FormSerial }}</p>
                                    <p> লিঙ্গ:
                                        @if ($result->Gender == 'M')
                                            পুরুষ
                                        @else
                                            {{ $result->Gender }} {{-- Show original if not M/F --}}
                                            মহিলা
                                        @endif
                                    </p>
                                </div>
                                <p
                                    class="border border-green-50 bg-green-100 bg-gradient-to-b from-blue-50 p-2 shadow-md">
                                    মেধা স্থান:
                                    <br>
                                    {{ $result->meritPosition }}
                                </p>
                            </div>
                            <div class="mt-2 space-y-1 text-sm text-green-700">
                                <div class="grid w-full grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2">
                                    <div class="rounded-lg border border-gray-200 bg-white">
                                        <table class="">
                                            <tbody>
                                                <tr class="border-b border-gray-100">
                                                    <td class="px-4 py-3 font-semibold text-gray-700">Test Score:
                                                    </td>
                                                    <td class="px-4 py-3 text-gray-900">{{ $result->TestScore }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-3 font-semibold text-gray-700">Merit
                                                        Score: </td>
                                                    <td class="px-4 py-3 text-gray-900">
                                                        {{ $result->meritScore }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-3 font-semibold text-gray-700">Inistitute
                                                        Name:</td>
                                                    <td class="px-4 py-3 text-gray-900">
                                                        {{ $result->allocatedInstituteName }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="rounded-lg border border-gray-200 bg-white">
                                        <table class="">
                                            <tbody>
                                                <tr class="border-b border-gray-100">
                                                    <td class="px-4 py-3 font-semibold text-gray-700">allocated
                                                        Institute Code
                                                    </td>
                                                    <td class="px-4 py-3 text-gray-900">
                                                        {{ $result->allocatedInstituteCode }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-3 font-semibold text-gray-700">allocation
                                                        Status</td>
                                                    <td class="px-4 py-3 text-gray-900">
                                                        {{ $result->allocationCriteria }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-4 py-3 font-semibold text-gray-700">
                                                        allocation Criteria:</td>
                                                    <td class="px-4 py-3 text-gray-900">
                                                        {{ $result->allocationStatus }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </p>
                            </div>

                            <!-- Print Button -->
                            <div class="mt-4 flex gap-4 text-center">
                                <button
                                    class="whitespace-nowrap rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition-all hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 active:scale-[0.98]"
                                    onclick="hideResult()">
                                    Cancel Result
                                </button>
                                <button
                                    class="rounded-lg bg-blue-600 px-6 py-2 font-semibold text-white shadow-md transition-colors duration-200 hover:bg-blue-700"
                                    onclick="printResult()">
                                    🖨️ Print Result
                                </button>
                            </div>

                            <script>
                                function printResult() {
                                    window.print();
                                }
                            </script>
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
                setTimeout(() => {
                    hideResult();
                }, 80000);

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

                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
                        hideResult();
                    }

                    if (window.history.pushState) {
                        window.history.pushState({}, '', '{{ route('home') }}');
                    }
                });
            </script>

            <div class="mt-6 grid grid-cols-3 gap-4 print:hidden">
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
    </main>
</div>

<x-footer />
