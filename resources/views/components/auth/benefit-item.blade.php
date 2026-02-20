@props(['title', 'description'])

<div class="auth-benefit-item">
    <div class="icon-box-accent-dark">
        {{ $icon }}
    </div>
    <div>
        <h3>{{ $title }}</h3>
        <p>{{ $description }}</p>
    </div>
</div>
