
@extends("layouts.master")

@section("contenu")
    <div class="row">
    <div class="col-12 p-4">
        <div class="jumbotron ">
                <h1 class="display-3">Soyez les Bienvenues M/Mme, <strong>{{userFullName()}} </strong></h1>
                @foreach(auth()->user()->roles as $role)
                <p><b>Vous êtes en Mode : {{$role->nom}}</b></p>
                @endforeach
                <p class="lead">GESTION DES LOCATIONS vous propose une solution  inédit et innovante pour vous garantir une location en toute tranquilité.</p>
                <hr class="my-4">
                <p>Nous sommes sur tout le plan internationnal</p>
                <p class="lead">
                <a class="btn btn-primary btn-lg" href="tel:+22999239287" role="button">Appeler nous</a>
                </p>
        </div>
    </div>
</div>
@endsection