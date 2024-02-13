@auth
    {{-- header  --}}
    <header>
        <nav class="border-gray-200 bg-white px-4 py-2.5 dark:bg-gray-900 lg:px-6">
            <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between px-4 md:px-6">
                <div class="flex items-center justify-start">
                    <a href="" class="mr-6 flex xl:mr-8">
                        @if (Settings::has('logo'))
                            <img src="@settings('logo')" class="mr-3 h-8 rounded" alt="@settings('app_name', 'WemX')" />
                        @endif
                        <span class="self-center whitespace-nowrap text-2xl font-semibold dark:text-white">
                            @settings('app_name', 'WemX')
                        </span>
                    </a>
                </div>
                @include(Theme::path('layouts.widgets.user-dropdown'))
            </div>
        </nav>

        <div class="border-b border-t border-gray-100 bg-gray-50 dark:border-gray-800 dark:bg-gray-800">
            <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between px-4 md:px-6">
                <ul class="-mb-px -ml-4 flex flex-wrap">
                    <li class="mr-2">
                        <a class="{{ is_active('dashboard') }} group inline-flex rounded-t-lg border-b-2 border-gray-50 px-4 py-4 text-center text-sm font-medium text-gray-500 dark:border-gray-800 dark:text-gray-400"
                            href="{{ route('dashboard') }}">
                            <span class="mr-2" style="font-size: 20px;">
                                <i class='bx bxs-dashboard'></i>
                            </span>
                            {!! __('client.dashboard') !!}
                        </a>
                    </li>
                    <li class="mr-2">
                        <a class="{{ is_active('news.index') }} group inline-flex rounded-t-lg border-b-2 border-gray-50 px-4 py-4 text-center text-sm font-medium text-gray-500 dark:border-gray-800 dark:text-gray-400"
                            href="{{ route('news.index') }}">
                            <span class="mr-2" style="font-size: 20px;">
                                <i class='bx bxs-news'></i>
                            </span>
                            {{ __('client.news') }}
                        </a>
                    </li>
                    <li class="mr-2">
                        <a class="{{ is_active('store.index') }} group inline-flex rounded-t-lg border-b-2 border-gray-50 px-4 py-4 text-center text-sm font-medium text-gray-500 dark:border-gray-800 dark:text-gray-400"
                            href="{{ route('store.index') }}">
                            <span class="mr-2" style="font-size: 20px;">
                                <i class='bx bxs-server'></i>
                            </span>
                            {!! __('client.services') !!}
                        </a>
                    </li>

                    @foreach (Page::getActive() as $page)
                        @if (in_array('navbar', $page->placement))
                            <li class="mr-2">
                                <a class="{{ is_active('page', ['page' => $page->path]) }} group inline-flex rounded-t-lg border-b-2 border-gray-50 px-4 py-4 text-center text-sm font-medium text-gray-500 dark:border-gray-800 dark:text-gray-400"
                                    href="{{ route('page', $page->path) }}" @if ($page->new_tab) target="_blank" @endif>
                                    <span class="mr-2" style="font-size: 20px;">
                                        {!! $page->icon !!}
                                    </span>
                                    {{ $page->name }}
                                </a>
                            </li>
                        @endif
                    @endforeach

                    {{-- load module nav items  --}}
                    @foreach (Module::allEnabled() as $module)
                        @if (config($module->getLowerName() . '.elements.main_menu'))
                            @foreach (config($module->getLowerName() . '.elements.main_menu') as $key => $menu)
                                <li class="mr-2">
                                    <a class="group inline-flex rounded-t-lg border-b-2 border-gray-50 px-4 py-4 text-center text-sm font-medium text-gray-500 dark:border-gray-800 dark:text-gray-400"
                                        href="{{ $menu['href'] }}">
                                        <span class="mr-2" style="font-size: 20px; {{ $menu['style'] }}">
                                            {!! $menu['icon'] !!}
                                        </span>
                                        {!! __($menu['name']) !!}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </header>
    {{-- end header --}}
@endauth

@guest
    <header>
        <nav class="border-gray-200 bg-white px-4 py-2.5 dark:bg-gray-800 lg:px-6">
            <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between">
                <a href="/" class="flex items-center">
                    <img src="@settings('logo', 'https://imgur.com/oJDxg2r.png')" class="mr-3 h-6 sm:h-9" alt="@settings('app_name', 'WemX')" />
                    <span class="self-center whitespace-nowrap text-xl font-semibold dark:text-white">@settings('app_name', 'WemX')</span>
                </a>

                @include(Theme::path('layouts.widgets.user-dropdown'))

                <div class="hidden w-full items-center justify-between lg:order-1 lg:flex lg:w-auto" id="mobile-menu-2">
                    <ul class="mt-4 flex flex-col font-medium lg:mt-0 lg:flex-row lg:space-x-8">
                        <li>
                            <a href="#home"
                                class="bg-primary-700 lg:text-primary-700 block rounded py-2 pl-3 pr-4 text-white dark:text-white lg:bg-transparent lg:p-0"
                                aria-current="page">
                                {!! __('client.home') !!}
                            </a>
                        </li>
                        <li>
                            <a href="#features"
                                class="lg:hover:text-primary-700 block border-b border-gray-100 py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:border-0 lg:p-0 lg:hover:bg-transparent lg:dark:hover:bg-transparent lg:dark:hover:text-white">
                                {!! __('client.features') !!}
                            </a>
                        </li>
                        <li>
                            <a href="#pricing"
                                class="lg:hover:text-primary-700 block border-b border-gray-100 py-2 pl-3 pr-4 text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:border-0 lg:p-0 lg:hover:bg-transparent lg:dark:hover:bg-transparent lg:dark:hover:text-white">
                                {!! __('client.pricing') !!}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
@endguest
