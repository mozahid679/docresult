<aside
    class="bg-sidebar text-sidebar-foreground sidebar-transition overflow-hidden border-r border-gray-200 dark:border-gray-700"
    :class="{ 'w-full md:w-64': sidebarOpen, 'w-0 md:w-16 hidden md:block': !sidebarOpen }">

    <div class="flex h-full flex-col">
        <!-- Sidebar Menu -->
        <nav class="custom-scrollbar flex-1 overflow-y-auto py-4">
            <ul class="space-y-1 px-2">
                <!-- Dashboard -->
                <x-layouts.sidebar-link href="{{ route('dashboard') }}" icon='fas-house' :active="request()->routeIs('dashboard*')">
                    Dashboard
                </x-layouts.sidebar-link>

                <!-- Search Results -->
                <x-layouts.sidebar-link href="{{ route('results.searchForm') }}" icon='fas-magnifying-glass'
                    :active="request()->routeIs('results.searchForm') || request()->routeIs('results.search')">
                    Search
                </x-layouts.sidebar-link>

                <!-- Upload Results -->
                <x-layouts.sidebar-link href="{{ route('results.upload') }}" icon='fas-upload' :active="request()->routeIs('results.upload') || request()->routeIs('results.store')">
                    Upload
                </x-layouts.sidebar-link>
            </ul>
        </nav>
    </div>
</aside>
