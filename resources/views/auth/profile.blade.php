<x-layout title="My Profile — StayNest" description="Your StayNest account profile.">

    <div class="max-w-lg mx-auto px-4 sm:px-6 lg:px-8 py-16">

        <h1 class="text-3xl font-bold text-slate-900 mb-8 text-center">My Profile</h1>

        <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">

            {{-- Banner + Avatar --}}
            <div class="bg-blue-900 px-10 py-10 flex flex-col items-center gap-4">
                <div class="size-20 rounded-full bg-white flex items-center justify-center shadow-md"
                     aria-hidden="true">
                    <span class="text-blue-900 text-3xl font-bold select-none">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </span>
                </div>
                <div class="text-center">
                    <p class="text-xl font-bold text-white">{{ auth()->user()->name }}</p>
                    <p class="text-blue-200 text-sm mt-0.5">{{ auth()->user()->email }}</p>
                </div>
            </div>

            {{-- Account details --}}
            <div class="px-10 py-6">
                <dl class="divide-y divide-slate-100">
                    <div class="flex justify-between py-4">
                        <dt class="text-xs font-semibold text-slate-500 uppercase tracking-wider self-center">Full name</dt>
                        <dd class="text-slate-900 font-medium">{{ auth()->user()->name }}</dd>
                    </div>
                    <div class="flex justify-between py-4">
                        <dt class="text-xs font-semibold text-slate-500 uppercase tracking-wider self-center">Email address</dt>
                        <dd class="text-slate-900 font-medium">{{ auth()->user()->email }}</dd>
                    </div>
                    <div class="flex justify-between py-4">
                        <dt class="text-xs font-semibold text-slate-500 uppercase tracking-wider self-center">Member since</dt>
                        <dd class="text-slate-900 font-medium">{{ auth()->user()->created_at->format('d F Y') }}</dd>
                    </div>
                </dl>
            </div>

            {{-- Log out --}}
            <div class="px-10 py-6 bg-slate-50 border-t border-slate-200 flex justify-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="flex items-center gap-2 min-h-[44px] px-6 border-2 border-slate-300
                                   hover:border-red-400 hover:text-red-700 text-slate-900 text-sm
                                   font-semibold rounded transition-colors bg-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" viewBox="0 0 24 24"
                             fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round" stroke-linejoin="round"
                             aria-hidden="true" focusable="false">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                        Log out
                    </button>
                </form>
            </div>

        </div>{{-- /card --}}
    </div>

</x-layout>