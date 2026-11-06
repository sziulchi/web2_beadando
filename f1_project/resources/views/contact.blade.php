<x-mainpage>
    <section id="main" class="container medium">
        <header>
            <h2>Kapcsolat</h2>
            <p>Kérdésed van az oldallal vagy az F1 adatbázissal kapcsolatban? Írj nekünk!</p>
        </header>

        <div class="box">
            @if (session('success'))
                <p style="color: #2e7d32; font-weight: bold;">{{ session('success') }}</p>
            @endif

            <form method="post" action="{{ route('contact.store') }}" novalidate>
                @csrf
                <div class="row gtr-50 gtr-uniform">
                    <div class="col-6 col-12-mobilep">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Név" />
                        @error('name')
                            <p style="color: #c62828; margin: 0.3em 0 0;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-6 col-12-mobilep">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="E-mail" />
                        @error('email')
                            <p style="color: #c62828; margin: 0.3em 0 0;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" placeholder="Tárgy" />
                        @error('subject')
                            <p style="color: #c62828; margin: 0.3em 0 0;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <textarea name="message" id="message" placeholder="Üzenet" rows="6">{{ old('message') }}</textarea>
                        @error('message')
                            <p style="color: #c62828; margin: 0.3em 0 0;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-12">
                        <ul class="actions special">
                            <li><input type="submit" value="Üzenet küldése" /></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-mainpage>