<x-layouts.app>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">{{ __('ডেটা আপলোড') }}</h1>
        <p class="mt-1 text-gray-600 dark:text-gray-400">{{ __(' ডেটা আপলোড পেইজে স্বাগতম') }}</p>
    </div>

    <div class="mb-6">
        <div class="flex items-center justify-center bg-gray-50 p-4">
            <div class="my-4 w-full max-w-lg overflow-hidden rounded-xl bg-white shadow-md">
                <div class="bg-blue-500 py-3 text-center">
                    <h2 class="text-lg font-bold text-gray-800">ফলাফল ডেটা আপলোড</h2>
                </div>

                <div class="space-y-5 p-6">
                    <div class="rounded-md border border-blue-200 bg-blue-50 p-4 text-sm leading-relaxed text-gray-800">
                        <p class="mb-1 font-semibold">ফাইল ফরম্যাট নির্দেশিকা:</p>
                        <ul class="list-inside list-disc space-y-1">
                            <li>ফাইলটি TSV (Tab Separated Values) ফরম্যাটে হতে হবে</li>
                            <li>প্রতিটি রো সহ সম্পূর্ণ ডেটা</li>
                            <li>
                                <span class="font-medium">সাপোর্টেড কলাম:</span>
                                <div class="mt-1 flex flex-wrap gap-1">
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">FormSerial</span>
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">pin</span>
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">roll</span>
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">serial</span>
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">fullName</span>
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">Gender</span>
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">TestScore</span>
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">meritScore</span>
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">meritPosition</span>
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">allocatedInstituteCode</span>
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">allocatedInstituteName</span>
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">allocationCriteria</span>
                                    <span
                                        class="shadow-xs rounded-md border border-blue-200 bg-white px-2 py-1 text-xs font-medium text-blue-700">allocationStatus</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <label class="mb-2 block font-medium text-gray-700">ফাইল নির্বাচন করুন</label>
                        <form class="space-y-5" action="{{ route('results.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input
                                class="rounded-mds block w-full cursor-pointer border border-gray-300 p-2 text-gray-800 file:mr-3 file:rounded-md file:border-0 file:bg-blue-500 file:px-4 file:py-2 file:font-semibold file:text-gray-800 hover:file:bg-blue-600"
                                name="file" type="file" accept=".csv, .tsv, .xls, .xlsx" />
                            <button
                                class="self-last flex rounded-md bg-blue-500 px-4 py-2 font-semibold text-black hover:bg-blue-600">আপলোড
                                করুন</button>
                        </form>

                        @if (session('success'))
                            <p class="mt-3 font-semibold text-green-600">{{ session('success') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.app>
