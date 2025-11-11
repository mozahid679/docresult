<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('ফলাফল') }}</h1>
        <p class="mt-1 text-gray-600 dark:text-gray-400">{{ __('Welcome to the ফলাফল') }}</p>
    </div>

    <div class="mb-6">
        <div class="flex flex-col items-center justify-center bg-gradient-to-b from-blue-50 to-white px-4 py-10">
            <div class="w-full max-w-md rounded-2xl bg-white p-4 text-center shadow-lg ring-1 ring-gray-100">
                <h2 class="mb-1 text-xl font-bold text-blue-700">স্বাগতম - স্বাস্থ্য শিক্ষা অধিদপ্তরে</h2>
                <h3 class="mb-2 text-base font-medium text-gray-800">প্রশিক্ষণ কোর্সে ভর্তি পরীক্ষার ফলাফল</h3>
                <p class="mb-8 text-sm text-gray-500">রোল নম্বর লিখে আপনার ফলাফল দেখুন</p>

                <div class="mb-8 flex items-center justify-center gap-2">
                    <input
                        class="w-full rounded-xl border border-gray-300 px-4 py-2.5 text-sm shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        type="text" placeholder="রোল নম্বর লিখুন..." />
                    <button
                        class="whitespace-nowrap rounded-xl bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition-all hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 active:scale-[0.98]">
                        ফলাফল দেখুন
                    </button>
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div class="rounded-xl bg-blue-50 py-4 shadow-sm">
                        <p class="text-3xl font-bold text-gray-800">11094</p>
                        <p class="text-sm font-medium text-gray-600">মোট শিক্ষার্থী</p>
                    </div>
                    <div class="rounded-xl bg-green-50 py-4 shadow-sm">
                        <p class="text-3xl font-bold text-gray-800">5479</p>
                        <p class="text-sm font-medium text-gray-600">ছেলে</p>
                    </div>
                    <div class="rounded-xl bg-pink-50 py-4 shadow-sm">
                        <p class="text-3xl font-bold text-gray-800">5615</p>
                        <p class="text-sm font-medium text-gray-600">মেয়ে</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
