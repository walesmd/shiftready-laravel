@props(['justify' => 'center'])

<div class="auth-visual-side" style="justify-content:{{ $justify }};">
    {{ $slot }}
</div>
