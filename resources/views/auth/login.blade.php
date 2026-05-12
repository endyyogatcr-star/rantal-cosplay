<x-guest-layout>
    <div class="text-center mb-6">
        <div class="flex justify-center mb-3">
            <img src="{{ asset('images/miku.gif') }}" 
                 alt="Miku Wave" 
                 class="w-40 h-40 drop-shadow-[0_0_15px_rgba(168,85,247,0.8)] object-contain">
        </div>
        
        <h2 class="text-2xl font-black text-white tracking-tighter italic uppercase" style="text-shadow: 2px 2px #9333ea;">
            READY TO HENSHIN?
        </h2>
        <p class="text-purple-200 text-[10px] font-bold mt-1 tracking-widest uppercase opacity-80">
            Cosplay Rental Member Portal ✨
        </p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email Address')" class="text-white text-xs font-bold ml-1 uppercase tracking-wider" />
            <x-text-input id="email" class="block mt-1 w-full bg-white/10 border-white/20 text-white text-sm rounded-xl focus:ring-purple-500 focus:border-purple-500 backdrop-blur-sm py-2 px-4" 
                          type="email" name="email" :value="old('email')" required autofocus placeholder="yourname@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-[10px] text-pink-400 font-bold" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" class="text-white text-xs font-bold ml-1 uppercase tracking-wider" />
            <x-text-input id="password" class="block mt-1 w-full bg-white/10 border-white/20 text-white text-sm rounded-xl focus:ring-purple-500 focus:border-purple-500 backdrop-blur-sm py-2 px-4" 
                          type="password" name="password" required placeholder="" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-pink-400 font-bold" />
        </div>

        <div class="flex items-center justify-between text-[10px] text-white px-1">
            <label class="inline-flex items-center cursor-pointer group">
                <input type="checkbox" name="remember" class="rounded bg-white/20 border-white/30 text-purple-600 focus:ring-purple-500 w-3 h-3">
                <span class="ml-2 font-medium italic group-hover:text-purple-300 transition-colors uppercase tracking-widest">Remember Me</span>
            </label>
            <a href="{{ route('password.request') }}" class="hover:text-purple-300 font-bold transition-all underline decoration-2 uppercase tracking-widest">Forgot Password?</a>
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-purple-600 to-pink-500 hover:from-purple-500 hover:to-pink-400 text-white font-black rounded-xl shadow-[0_0_15px_rgba(168,85,247,0.3)] transition transform hover:scale-[1.02] active:scale-95 border-b-4 border-purple-800 tracking-widest text-sm uppercase">
                Authorize Login
            </button>
        </div>

        <div class="text-center pt-4 border-t border-white/10 mt-4">
            <p class="text-[10px] text-white/60 italic">Don't have a member account?</p>
            <a href="{{ route('register') }}" class="text-xs text-pink-400 hover:text-white font-black uppercase tracking-tighter ml-1 underline decoration-2 transition-all">Register Now</a>
        </div>
    </form>
</x-guest-layout>