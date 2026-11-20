<x-layouts.admin title="Anmelden">
    <div class="mx-auto mt-16 max-w-sm">
        <form method="POST" action="{{ route('admin.login.attempt') }}" class="card p-6">
            @csrf
            <h1 class="font-serif text-2xl font-semibold">Aufgabenverwaltung</h1>
            <p class="mt-1 text-sm text-ink-400">Bitte mit dem Admin-Passwort anmelden.</p>

            <label for="password" class="label mt-6 block">Passwort</label>
            <input id="password" name="password" type="password" class="input mt-2" autocomplete="current-password" required autofocus>
            @error('password')
                <p class="mt-2 text-sm text-danger-400">{{ $message }}</p>
            @enderror

            <button class="btn-primary mt-6 w-full">Anmelden</button>
        </form>
    </div>
</x-layouts.admin>
