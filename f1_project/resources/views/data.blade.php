<x-mainpage>
    <section id="main" class="container">
        <header>
            <h2>Adatbázis</h2>
            <p>Forma-1 nagydíjak, pilóták és futameredmények</p>
        </header>

        <p>
            <a href="#gps" class="button small">Nagydíjak</a>
            <a href="#drivers" class="button small">Pilóták</a>
            <a href="#results" class="button small">Eredmények</a>
        </p>

        <section class="box" id="gps">
            <h3>Nagydíjak (gps)</h3>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Dátum</th>
                            <th>Nagydíj</th>
                            <th>Ország</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gps as $gp)
                            <tr>
                                <td>{{ $gp->date }}</td>
                                <td>{{ $gp->name }}</td>
                                <td>{{ $gp->country }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <x-data.pager :paginator="$gps" />
        </section>

        <section class="box" id="drivers">
            <h3>Pilóták (drivers)</h3>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Név</th>
                            <th>Nem</th>
                            <th>Születési dátum</th>
                            <th>Nemzetiség</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($drivers as $driver)
                            <tr>
                                <td>{{ $driver->name }}</td>
                                <td>{{ $driver->gender === 'N' ? 'Nő' : 'Férfi' }}</td>
                                <td>{{ $driver->birth_date ?? '-' }}</td>
                                <td>{{ $driver->nationality }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <x-data.pager :paginator="$drivers" />
        </section>

        <section class="box" id="results">
            <h3>Eredmények (results)</h3>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Dátum</th>
                            <th>Nagydíj</th>
                            <th>Pilóta</th>
                            <th>Helyezés</th>
                            <th>Csapat</th>
                            <th>Autó</th>
                            <th>Motor</th>
                            <th>Kiesés oka</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result)
                            <tr>
                                <td>{{ $result->date }}</td>
                                <td>{{ $result->gp?->name ?? '-' }}</td>
                                <td>{{ $result->driver?->name ?? '-' }}</td>
                                <td>{{ $result->pos ?? '-' }}</td>
                                <td>{{ $result->team ?? '-' }}</td>
                                <td>{{ $result->type }}</td>
                                <td>{{ $result->engine }}</td>
                                <td>{{ $result->error ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <x-data.pager :paginator="$results" />
        </section>
    </section>
</x-mainpage>