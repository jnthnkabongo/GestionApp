@extends('administration.layout.aside')
@section('content')
    <div id="main" class="main">
        <div class="row">
            <div class="col-md-4">
                <div class="pagetitle">
                    <h1>Détail Equipement</h1>
                    <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Détail Equipement</li>
                    </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <a href="{{ route('liste-equipement') }}" class="btn btn-primary w-100"  >Retour Liste Equipement</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
            <h5 class="card-title text-center">Détail d'un équipement</h5>

                <form action="{{ route('details-equipement',$item->id) }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="equipement" name="equipement" value="{{ $item->equipement }}" readonly>
                            <label for="floatingName">Equipement</label>
                        </div>
                        <div class="text-danger">
                            @error("equipement")
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="serialnumber" name="serialnumber" value="{{ $item->serialnumber }}" readonly>
                            <label for="floatingName">Numéro Série</label>
                        </div>
                        <div class="text-danger">
                            @error("serialnumber")
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="equipementtype" name="equipementtype" value="{{ $item->Equipement->intitule }}" readonly>
                            <label for="floatingSelect">Equipement Type</label>
                        </div>
                        <div class="text-danger">
                            @error("equipementtype")
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="" name="" value="{{ $item->State->intitule }}" readonly>
                            <label for="floatingSelect">Etat</label>
                        </div>
                        <div class="text-danger">
                            @error("state_id")
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="location_id" name="location_id" value="{{ $item->Region->nom }}" readonly>
                            <label for="floatingSelect">Region</label>
                        </div>
                        <div class="text-danger">
                            @error("location_id")
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="site_id" name="site_id" value="{{ $item->Site->site }}" readonly>
                            <label for="floatingSelect">Site</label>
                        </div>
                        <div class="text-danger">
                            @error("site_id")
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="productnumber" name="productnumber" value="{{ $item->productnumber }}" readonly>
                            <label for="floating">Numéro Produit</label>
                        </div>
                        <div class="text-danger">
                            @error("productnumber")
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="available" name="available" value="{{ $item->available }}" readonly>
                            <label for="floatingName">Available </label>
                        </div>
                        <div class="text-danger">
                            @error("available")
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="feedback" name="feedback" value="{{ $item->feedback }}" readonly>
                            <label for="floatingName">Feedback</label>
                        </div>
                        <div class="text-danger">
                            @error('feedback')
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <textarea class="form-control" id="observation" name="observation" style="height: 100px;" readonly>{{ $item->observation }}</textarea>
                            <label for="floatingTextarea">Observation</label>
                            <div class="text-danger">
                                @error("observation")
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <a href="{{ route('liste-equipement') }}" class="btn btn-primary w-50">Fermer</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
