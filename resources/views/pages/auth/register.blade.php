<x-auth-layout title="Register" action="{{route('user.register')}}" method="POST">
    @csrf
    @error('username')
    Wrong Username
    @enderror
    @error('password')
    Wrong Password
    @enderror
    @error('email')
    Wrong Email
    @enderror
    <h1 class="text-5xl font-bold">Sign Up</h1>
    <div class="flex flex-col gap-5 self-stretch">
        <x-form-input id="usernameInp" type="text" name="username" placeholder="Input your username">
            @svg('svg\person.svg')
        </x-form-input>
        <x-form-input id="emailInp" type="mail" name="email" placeholder="Input your email">
            @svg('svg\mail.svg')
        </x-form-input>
        <x-form-input id="passwordInp" type="password" name="password" placeholder="Input your password">
            @svg('svg\password.svg')
        </x-form-input>
        <x-form-input id="passwordInp" type="password" name="password_confirmation" placeholder="Confirm your password">
            @svg('svg\password.svg')
        </x-form-input>

        <label for="rememberCheck" class="text-black-less text-sm">
            <input id="rememberCheck" name="rememberMe" type="checkbox" class="rounded-md w-5 h-5 mr-2 text-black-less focus:ring-0 focus:border-[1.5px]">
            Remember me
        </label>
    </div>

    <x-button type="submit" class="self-stretch text-lg">Create an Account</x-button>

    <div class="text-black-less text-sm self-center">Already have an account? <span class="text-black font-semibold"><a href="{{ route('user.login') }}">Sign In</a></span></div>
</x-auth-layout>
