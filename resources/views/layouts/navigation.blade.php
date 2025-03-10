<nav x-data="{ open: false }" class="border-b border-primary-100 bg-accent">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <!-- Left Side: Logo and Desktop Navigation -->
        <div class="flex">
          <!-- Logo -->
          <div class="flex items-center shrink-0">
            <a href="{{ route('dashboard') }}">
              <x-application-logo class="block w-auto fill-current h-9 text-primary" />
            </a>
          </div>
          <!-- Navigation Links (Desktop) -->
          <div class="hidden ml-10 sm:flex sm:ml-5 sm:space-x-4">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
              <span class="text-primary">Dashboard</span>
            </x-nav-link>
            <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
              <span class="text-primary">About</span>
            </x-nav-link>
            <x-nav-link :href="route('services')" :active="request()->routeIs('services')">
              <span class="text-primary">Services</span>
            </x-nav-link>
            <x-nav-link :href="route('blog.index')" :active="request()->routeIs('blog.index')">
              <span class="text-primary">Blog</span>
            </x-nav-link>
            <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
              <span class="text-primary">Contact</span>
            </x-nav-link>
            <x-nav-link :href="route('predict.history')" :active="request()->routeIs('predict.history')">
              <span class="text-primary">History</span>
            </x-nav-link>

          </div>
        </div>

        <!-- Right Side: Theme, Mobile Menu, and User Dropdown -->
        <div class="flex items-center">
          <!-- Theme Dropdown -->
          <div class="relative mr-4">
            <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                <button class="inline-flex items-center px-2 py-2 text-lg font-medium transition duration-150 ease-in-out rounded-md text-primary hover:text-secondary focus:outline-none">
                  <i class="fas fa-palette"></i>
                </button>
              </x-slot>
              <x-slot name="content">
                <button onclick="setTheme('default')" class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                  <span class="inline-block w-4 h-4 mr-2 rounded-full" style="background-color: var(--color-primary);"></span>
                  Default
                </button>
                <button onclick="setTheme('theme-warm')" class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                  <span class="inline-block w-4 h-4 mr-2 rounded-full" style="background-color: #FF5722;"></span>
                  Warm
                </button>
                <button onclick="setTheme('theme-green')" class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                  <span class="inline-block w-4 h-4 mr-2 rounded-full" style="background-color: #4CAF50;"></span>
                  Green
                </button>
                <button onclick="setTheme('theme-dark')" class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                  <span class="inline-block w-4 h-4 mr-2 rounded-full" style="background-color: #212121;"></span>
                  Dark
                </button>
                <button onclick="setTheme('theme-teal')" class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                  <span class="inline-block w-4 h-4 mr-2 rounded-full" style="background-color: #009688;"></span>
                  Teal
                </button>
              </x-slot>
            </x-dropdown>
          </div>

          <!-- Mobile Menu Button -->
          <div class="flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 transition duration-150 ease-in-out rounded-md text-primary hover:text-secondary hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
              <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                      stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                      stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- User Dropdown -->
          <div class="hidden ml-4 sm:flex sm:items-center">
            @auth
              <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                  <button class="inline-flex items-center px-3 py-2 text-sm font-medium transition duration-150 ease-in-out border border-transparent rounded-md text-primary hover:text-secondary focus:outline-none">
                    <img src="{{ Auth::user()->getAvatar() }}" alt="User Avatar" class="w-8 h-8 rounded-full">
                  </button>
                </x-slot>
                <x-slot name="content">
                  <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                  </x-dropdown-link>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault(); this.closest('form').submit();">
                      {{ __('Log Out') }}
                    </x-dropdown-link>
                  </form>
                </x-slot>
              </x-dropdown>
            @endauth

            @guest
              <a href="{{ route('login') }}" class="transition duration-150 text-primary hover:text-secondary">
                Login
              </a>
            @endguest
          </div>
        </div>
      </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
      <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
          {{ __('Dashboard') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
          {{ __('About') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('services')" :active="request()->routeIs('services')">
          {{ __('Services') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('blog.index')" :active="request()->routeIs('blog.index')">
          {{ __('Blog') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
          {{ __('Contact') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('predict.history')" :active="request()->routeIs('predict.history')">
          {{ __('History') }}
        </x-responsive-nav-link>
      </div>

      <!-- Responsive Settings Options -->
      <div class="pt-4 pb-1 border-t border-gray-200">
        @auth
          <div class="px-4">
            <div class="text-base font-medium text-primary">{{ Auth::user()->name }}</div>
            <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
          </div>
          <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('profile.edit')">
              {{ __('Profile') }}
            </x-responsive-nav-link>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Log Out') }}
              </x-responsive-nav-link>
            </form>
          </div>
        @endauth
      </div>
    </div>
  </nav>
