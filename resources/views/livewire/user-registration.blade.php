<form wire:submit.prevent="registrationStore" class="space-y-6">
    <div>
        <label for="name">Username</label>
        <input id="name" type="text" wire:model="name" required placeholder="Choose a name" />
        @error('name')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="email">Email</label>
        <input id="email" type="email" wire:model="email" required placeholder="you@example.com" />
        @error('email')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password">Password</label>
        <input id="password" type="password" wire:model="password" required placeholder="Create a strong password" />
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" wire:model="password_confirmation" required
            placeholder="Confirm your password" />
    </div>

    <button type="submit">Create Account</button>
</form>
