<?php

use App\Models\WaitlistEntry;
use Livewire\Volt\Component;

new class extends Component
{
    public string $email = '';
    public bool $submitted = false;

    public function submit(): void
    {
        $this->validate(['email' => ['required', 'email', 'max:255']]);

        WaitlistEntry::firstOrCreate(['email' => $this->email]);

        $this->submitted = true;
    }
}; ?>

<div class="waitlist-box">
    @if ($submitted)
        <h3 style="font-weight:600;font-size:1rem;color:var(--foreground);">You're on the list!</h3>
        <p class="text-sm text-muted" style="margin-top:0.5rem;">We'll let you know as soon as we launch in your city.</p>
    @else
        <h3 style="font-weight:600;font-size:1rem;color:var(--foreground);">Not in our area yet?</h3>
        <p class="text-sm text-muted" style="margin-top:0.5rem;">Join our waitlist and be the first to know when we launch in your city.</p>
        <form wire:submit="submit" class="waitlist-form">
            <input wire:model="email" type="email" placeholder="Enter your email" class="form-input" style="flex:1;" />
            <button type="submit" class="btn btn-primary">Notify Me</button>
        </form>
        @error('email')
            <p class="text-sm" style="color:var(--destructive);margin-top:0.5rem;">{{ $message }}</p>
        @enderror
    @endif
</div>
