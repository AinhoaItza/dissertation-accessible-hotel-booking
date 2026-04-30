<x-layout title="Sign in — StayNest" description="Sign in to your StayNest account to manage bookings.">

    <div class="min-h-[calc(100vh-64px)] flex flex-col items-center justify-center py-12 px-4 bg-white">

        <div style="width:100%;max-width:500px;">

            <h1 class="text-2xl font-bold text-slate-900 mb-1 text-center">Sign in</h1>
            <p class="text-slate-700 text-sm mb-8 text-center">
                New to StayNest?
                <a href="{{ route('register') }}" class="font-semibold text-blue-900 hover:underline">
                    Create an account
                </a>
            </p>

            @if ($errors->any())
                <div role="alert" aria-labelledby="error-summary-heading"
                    class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p id="error-summary-heading" class="text-red-900 text-sm font-semibold mb-1">Please correct the
                        following:</p>
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

                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-900 mb-1">Email
                            address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            autocomplete="email" required aria-required="true" aria-describedby="email-error"
                            @error('email') aria-invalid="true" @enderror
                            class="w-full h-11 px-3 border-2 rounded text-slate-900 bg-white transition-colors
                                      @error('email') border-red-800 @else border-slate-300 hover:border-slate-500 @enderror">
                        <p id="email-error" class="text-red-900 text-sm mt-1"
                            @if (!$errors->has('email')) hidden @endif>{{ $errors->first('email') }}</p>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-900 mb-1">Password</label>
                        <div style="position:relative;">
                            <input type="password" id="password" name="password" autocomplete="current-password"
                                required aria-required="true" aria-describedby="password-error"
                                @error('password') aria-invalid="true" @enderror
                                class="w-full h-11 px-3 pr-12 border-2 rounded text-slate-900 bg-white transition-colors
                                          @error('password') border-red-800 @else border-slate-300 hover:border-slate-500 @enderror">
                            <button type="button" aria-label="Show password" onclick="togglePassword(this)"
                                style="position:absolute; right:12px; top:50%; transform:translateY(-50%); min-height:44px; min-width:44px; display:flex; align-items:center; justify-content:center;"
                                class="text-slate-500 hover:text-slate-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" aria-hidden="true" focusable="false">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </button>
                        </div>
                        <p id="password-error" class="text-red-900 text-sm mt-1"
                            @if (!$errors->has('password')) hidden @endif>{{ $errors->first('password') }}</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="remember" name="remember"
                            class="w-5 h-5 rounded border-2 border-slate-300 accent-blue-900">
                        <label for="remember" class="text-sm font-medium text-slate-900 select-none">Remember me</label>
                    </div>

                </div>

                <button type="submit"
                    class="w-full flex items-center justify-center min-h-[44px] mt-8 px-6
                               bg-blue-900 hover:bg-blue-800 text-white font-semibold rounded transition-colors">
                    Sign in
                </button>

            </form>

        </div>

        <div
            style="width:100%;max-width:500px;margin-top:2rem;padding-top:1.5rem;border-top:1px solid #e2e8f0;text-align:center;">
            By signing in, you agree to our
            <a href="#" class="font-semibold text-blue-900 hover:underline">Terms &amp; Conditions</a>
            and <a href="#" class="font-semibold text-blue-900 hover:underline">Privacy Policy</a>.
            </p>
            <p class="text-slate-500 text-xs mt-2">&copy; {{ date('Y') }} StayNest. All rights reserved.</p>
        </div>

    </div>

    <script>
        function togglePassword(btn) {
            const input = btn.parentElement.querySelector('input');
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            btn.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
            btn.innerHTML = isHidden ?
                '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/></svg>' :
                '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>';
        }
    </script>

</x-layout>
