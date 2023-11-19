<?php include(APP_DIR . '/resources/views/layouts/admin/header.php') ?>
    <!-- Main Content Wrapper -->
    <main class="main-content w-full pb-8">
        <div class="mt-4 grid grid-cols-12 gap-4 px-[var(--margin-x)] transition-all duration-[.25s] sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
            <div class="col-span-12 lg:col-span-8">
                <div class="flex items-center justify-between space-x-2">
                    <h2 class="text-base font-medium tracking-wide text-slate-800 line-clamp-1 dark:text-navy-100">
                        Sales Overview
                    </h2>
                    <div x-data="{activeTab:'tabRecent'}" class="is-scrollbar-hidden overflow-x-auto rounded-lg bg-slate-200 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                        <div class="tabs-list flex p-1">
                            <button @click="activeTab = 'tabRecent'" :class="activeTab === 'tabRecent' ? 'bg-white shadow dark:bg-navy-500 dark:text-navy-100' : 'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 px-3 py-1 text-xs+ font-medium">
                                Last month
                            </button>
                            <button @click="activeTab = 'tabAll'" :class="activeTab === 'tabAll' ? 'bg-white shadow dark:bg-navy-500 dark:text-navy-100' : 'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'" class="btn shrink-0 px-3 py-1 text-xs+ font-medium">
                                Last year
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row sm:space-x-7">
                    <div class="mt-4 flex shrink-0 flex-col items-center sm:items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                        </svg>
                        <div class="mt-4">
                            <div class="flex items-center space-x-1">
                                <p class="text-2xl font-semibold text-slate-700 dark:text-navy-100">
                                    $6,556.55
                                </p>
                                <button class="btn h-6 w-6 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                    </svg>
                                </button>
                            </div>
                            <p class="text-xs text-slate-400 dark:text-navy-300">
                                this month
                            </p>
                        </div>
                        <div class="mt-3 flex items-center space-x-2">
                            <div class="ax-transparent-gridline w-28">
                                <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.analyticsSalesThisMonth); $el._x_chart.render() });"></div>
                            </div>
                            <div class="flex items-center space-x-0.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
                                </svg>
                                <p class="text-sm+ text-slate-800 dark:text-navy-100">
                                    3.2%
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="ax-transparent-gridline grid w-full grid-cols-1">
                        <div x-init="$nextTick(() => { $el._x_chart = new ApexCharts($el,pages.charts.analyticsSalesOverview); $el._x_chart.render() });"></div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-4">
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 sm:gap-5 lg:grid-cols-2">
                    <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                        <div class="flex justify-between space-x-1">
                            <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                $67.6k
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary dark:text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="mt-1 text-xs+">Income</p>
                    </div>
                    <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                        <div class="flex justify-between">
                            <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                12.6K
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <p class="mt-1 text-xs+">Completed</p>
                    </div>
                    <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                        <div class="flex justify-between">
                            <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                143
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-warning" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="mt-1 text-xs+">Pending</p>
                    </div>
                    <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                        <div class="flex justify-between">
                            <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                651
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                            </svg>
                        </div>
                        <p class="mt-1 text-xs+">Dispatch</p>
                    </div>
                    <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                        <div class="flex justify-between space-x-1">
                            <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                46k
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-secondary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <p class="mt-1 text-xs+">Products</p>
                    </div>
                    <div class="rounded-lg bg-slate-150 p-4 dark:bg-navy-700">
                        <div class="flex justify-between">
                            <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
                                8.8k
                            </p>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-error" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <p class="mt-1 text-xs+">Customers</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php include(APP_DIR . '/resources/views/layouts/admin/footer.php') ?>