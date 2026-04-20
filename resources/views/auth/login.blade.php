<x-layout title="Sign in — StayNest" description="Sign in to your StayNest account to manage bookings.">

    <div class="flex-1 flex items-center justify-center py-12 px-4 sm:px-6">
        <div class="w-full max-w-md bg-white border border-slate-200 rounded-xl shadow-sm p-8 sm:p-10">

            {{-- Heading --}}
            <h1 class="text-2xl font-bold text-slate-900 mb-1">Sign in</h1>
            <p class="text-slate-700 text-sm mb-8">
                New to StayNest?
                <a href="{{ route('register') }}"
                   class="font-semibold text-blue-900 hover:underline">
                    Create an account
                </a>
            </p>

            {{-- ── Error summary (WCAG 3.3.1) ── --}}
            @if ($errors->any())
            <div role="alert"
                 aria-labelledby="error-summary-heading"
                 class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                <p id="error-summary-heading" class="text-red-900 text-sm font-semibold mb-1">
                    Please correct the following:
                </p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="text-red-900 text-sm">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="space-y-5">

                    {{-- ── Email ── --}}
                    <div>
                        <label for="email"
                               class="block text-sm font-semibold text-slate-900 mb-1">
                            Email address
                        </label>
                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               autocomplete="email"
                               required
                               aria-required="true"
                               aria-describedby="email-error"
                               @error('email') aria-invalid="true" @enderror
                               class="w-full h-11 px-3 border-2 rounded text-slate-900 bg-white transition-colors
                                      @error('email') border-red-800 @else border-slate-300 hover:border-slate-500 @enderror">
                        <p id="email-error"
                           class="text-red-900 text-sm mt-1"
                           @if (! $errors->has('email')) hidden @endif>
                            {{ $errors->first('email') }}
                        </p>
                    </div>

                    {{-- ── Password ── --}}
                    <div>
                        <label for="password"
                               class="block text-sm font-semibold text-slate-900 mb-1">
                            Password
                        </label>
                        <input type="password"
                               id="password"
                               name="password"
                               autocomplete="current-password"
                               required
                               aria-required="true"
                               aria-describedby="password-error"
                               @error('password') aria-invalid="true" @enderror
                               class="w-full h-11 px-3 border-2 rounded text-slate-900 bg-white transition-colors
                                      @error('password') border-red-800 @else border-slate-300 hover:border-slate-500 @enderror">
                        <p id="password-error"
                           class="text-red-900 text-sm mt-1"
                           @if (! $errors->has('password')) hidden @endif>
                            {{ $errors->first('password') }}
                        </p>
                    </div>

                    {{-- ── Remember me ── --}}
                    <div class="flex items-center gap-3">
                        <input type="checkbox"
                               id="remember"
                               name="remember"
                               class="w-5 h-5 rounded border-2 border-slate-300 accent-blue-900">
                        <label for="remember"
                               class="text-sm font-medium text-slate-900 select-none">
                            Remember me
                        </label>
                    </div>

                </div>

                {{-- ── Submit ── --}}
                <button type="submit"
                        class="w-full flex items-center justify-center min-h-[44px] mt-8 px-6
                               bg-blue-900 hover:bg-blue-800 text-white font-semibold rounded transition-colors">
                    Sign in
                </button>
            </form>

        </div>{{-- /card --}}
    </div>

</x-layout>
