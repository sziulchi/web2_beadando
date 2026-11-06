<x-mainpage>
    <section id="main" class="container medium">
        <header><h2>Új pilóta</h2></header>
        <div class="box">
            <form method="post" action="...">
                @csrf
                @include('crud.form')
                <ul class="actions special"><li><input type="submit" value="Mentés" /></li></ul>
            </form>
        </div>
    </section>
</x-mainpage>