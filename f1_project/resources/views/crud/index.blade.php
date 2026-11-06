<x-mainpage>
    <section id="main" class="container">
        <header>
            <h2>Pilóták kezelése</h2>
        </header>

        @if (session('success'))
            <div class="box">{{ session('success') }}</div>
        @endif

        <div class="box">
            <a href="{{ route('crud.create') }}" class="button alt" style="color: black;">Új pilóta</a>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Név</th>
                            <th>Nem</th>
                            <th>Születési dátum</th>
                            <th>Nemzetiség</th>
                            <th>Változtatás</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drivers as $driver)
                        <tr>
                            <td>{{ $driver->name }}</td>
                            <td>{{ $driver->gender }}</td>
                            <td>{{ $driver->birth_date ?? '-' }}</td>
                            <td>{{ $driver->nationality }}</td>
                            <td>
                                <a href="{{ route('crud.edit', $driver) }}" class="button alt small" style="color: black;">Szerkesztés</a>

                                <form method="post" action="{{ route('crud.destroy', $driver) }}" style="display:inline"
                                    onsubmit="return confirm('Biztosan törlöd? A pilóta eredményei is törlődnek.')">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Törlés" class="button alt small" style="color: black;">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- TODO: pagination --}}
    @if ($drivers->previousPageUrl())
        <a href="{{ $drivers->previousPageUrl() }}" class="button alt">Előző</a>
    @endif
        <span>{{ $drivers->currentPage() }} / {{ $drivers->lastPage() }}</span>
    @if ($drivers->nextPageUrl())
        <a href="{{ $drivers->nextPageUrl() }}" class="button alt">Következő</a>
    @endif
        </div>
    </section>
</x-mainpage>