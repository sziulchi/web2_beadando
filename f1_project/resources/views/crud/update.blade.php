<x-mainpage>
<section id="main" class="container medium">
    <header><h2>Új pilóta</h2></header>
    <div class="box">
        <form method="post" action="...">
            @csrf
            @method('PUT') on edit only
            @include('crud.form')
        </form>
    </div>
</section>
</x-mainpage>