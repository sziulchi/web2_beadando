<x-mainpage>
    <section id="main" class="container">
        <header>
            <h2>Üzenetek</h2>
            <p>A Kapcsolat űrlapon érkezett üzenetek, a legfrissebb elöl</p>
        </header>

        <div class="box">
            @if ($messages->isEmpty())
                <p>Még nem érkezett üzenet.</p>
            @else
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Küldés ideje</th>
                                <th>Név</th>
                                <th>E-mail</th>
                                <th>Tárgy</th>
                                <th>Üzenet</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $msg)
                                <tr>
                                    <td style="white-space: nowrap;">{{ $msg->created_at->format('Y.m.d. H:i') }}</td>
                                    <td>{{ $msg->name }}</td>
                                    <td><a href="mailto:{{ $msg->email }}">{{ $msg->email }}</a></td>
                                    <td>{{ $msg->subject }}</td>
                                    <td style="white-space: pre-line;">{{ $msg->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <x-data.pager :paginator="$messages" />
            @endif
        </div>
    </section>
</x-mainpage>