<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <script>
        window.Flags = @json(
            collect(\App\Enums\Feature::cases())
                ->mapWithKeys(fn (\App\Enums\Feature $f) => [$f->value => $f->isEnabled()])
                ->all()
        );
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <div class="auth-layout">
        <div class="auth-form-side">
            {{ $slot }}
        </div>
        {{ $visual ?? '' }}
    </div>

</body>
</html>
