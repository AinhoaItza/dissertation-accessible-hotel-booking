<x-layout title="My Profile — StayNest" description="Your StayNest account profile.">

    <div class="bg-slate-100 min-h-screen py-8 px-4 sm:px-6 lg:px-8">

        <div class="max-w-4xl mx-auto">

            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-slate-900">My Profile</h1>
                <p class="text-slate-600 text-sm mt-2">Manage your StayNest account details.</p>
            </div>

            @if (session('status'))
                <div role="alert" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
                    <p class="text-green-900 text-sm font-semibold">{{ session('status') }}</p>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                {{-- Card 1: Account info --}}
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm" style="padding:2.5rem;">
                    <h2 class="text-lg font-bold text-slate-900 mb-6">Account details</h2>
                    <div class="space-y-5">
                        <div>
                            <p class="text-sm font-semibold text-slate-700 mb-1">Full name</p>
                            <div
                                class="w-full h-11 px-4 border-2 border-slate-300 rounded-lg text-slate-900 bg-white flex items-center text-sm">
                                {{ auth()->user()->name }}
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-700 mb-1">Email address</p>
                            <div
                                class="w-full h-11 px-4 border-2 border-slate-300 rounded-lg text-slate-900 bg-white flex items-center text-sm">
                                {{ auth()->user()->email }}
                            </div>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-700 mb-1">Member since</p>
                            <div
                                class="w-full h-11 px-4 border-2 border-slate-300 rounded-lg text-slate-900 bg-white flex items-center text-sm">
                                {{ auth()->user()->created_at->format('d F Y') }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card 2: Change password --}}
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm" style="padding:2.5rem;">
                    <h2 class="text-lg font-bold text-slate-900 mb-6">Change password</h2>

                    @if ($errors->any())
                        <div role="alert" aria-labelledby="error-summary-heading"
                            class="mb-5 p-4 bg-red-50 border border-red-200 rounded-lg">
                            <p id="error-summary-heading" class="text-red-900 text-sm font-semibold mb-1">Please correct
                                the following:</p>
                            <ul class="list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="text-red-900 text-sm">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('profile.password') }}" class="space-y-5">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="current_password"
                                class="block text-sm font-semibold text-slate-700 mb-1">Current password</label>
                            <div style="position:relative;">
                                <input type="password" id="current_password" name="current_password" required
                                    aria-required="true" aria-describedby="current-password-error"
                                    @error('current_password') aria-invalid="true" @enderror style="padding-right:3rem;"
                                    class="w-full h-11 px-3 border-2 rounded-lg text-slate-900 bg-white transition-colors
                                              @error('current_password') border-red-800 @else border-slate-300 hover:border-slate-500 @enderror">
                                <button type="button" aria-label="Show password" onclick="togglePassword(this)"
                                    style="position:absolute;top:0;right:0;height:44px;width:44px;display:flex;align-items:center;justify-content:center;background:transparent;border:none;cursor:pointer;color:#64748b;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                                        focusable="false">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                            </div>
                            <p id="current-password-error" class="text-red-900 text-sm mt-1"
                                @if (!$errors->has('current_password')) hidden @endif>{{ $errors->first('current_password') }}
                            </p>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-semibold text-slate-700 mb-1">New
                                password</label>
                            <p id="new-password-hint" class="text-slate-500 text-xs mb-2">Must be at least 8 characters.
                            </p>
                            <div style="position:relative;">
                                <input type="password" id="password" name="password" required aria-required="true"
                                    aria-describedby="new-password-hint new-password-error"
                                    @error('password') aria-invalid="true" @enderror style="padding-right:3rem;"
                                    class="w-full h-11 px-3 border-2 rounded-lg text-slate-900 bg-white transition-colors
                                              @error('password') border-red-800 @else border-slate-300 hover:border-slate-500 @enderror">
                                <button type="button" aria-label="Show password" onclick="togglePassword(this)"
                                    style="position:absolute;top:0;right:0;height:44px;width:44px;display:flex;align-items:center;justify-content:center;background:transparent;border:none;cursor:pointer;color:#64748b;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                                        focusable="false">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                            </div>
                            <p id="new-password-error" class="text-red-900 text-sm mt-1"
                                @if (!$errors->has('password')) hidden @endif>{{ $errors->first('password') }}</p>
                        </div>

                        <div>
                            <label for="password_confirmation"
                                class="block text-sm font-semibold text-slate-700 mb-1">Confirm new password</label>
                            <div style="position:relative;">
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    aria-required="true" style="padding-right:3rem;"
                                    class="w-full h-11 px-3 border-2 border-slate-300 hover:border-slate-500 rounded-lg text-slate-900 bg-white transition-colors">
                                <button type="button" aria-label="Show password" onclick="togglePassword(this)"
                                    style="position:absolute;top:0;right:0;height:44px;width:44px;display:flex;align-items:center;justify-content:center;background:transparent;border:none;cursor:pointer;color:#64748b;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                                        focusable="false">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full flex items-center justify-center min-h-[44px] px-6
                                       bg-blue-900 hover:bg-blue-800 text-white font-semibold rounded-lg transition-colors">
                            Update password
                        </button>

                    </form>
                </div>

            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center justify-center gap-2 min-h-[44px] px-6
                               border-2 border-blue-900 bg-blue-900 hover:bg-blue-800
                               text-white text-sm font-semibold rounded-xl transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4 shrink-0" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" aria-hidden="true" focusable="false">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                    Log out
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-slate-300 text-center">
                <p class="text-slate-600 text-sm">
                    By using StayNest, you agree to our
                    <a href="#" class="font-semibold text-blue-900 hover:underline">Terms &amp; Conditions</a>
                    and <a href="#" class="font-semibold text-blue-900 hover:underline">Privacy Policy</a>.
                </p>
                <p class="text-slate-500 text-xs mt-2">&copy; {{ date('Y') }} StayNest. All rights reserved.</p>
            </div>

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
