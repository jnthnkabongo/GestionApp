@extends('administration.layout.aside')
@section('content')
    <div id="main" class="main">
        <div class="row">
            <div class="col-md-4">
                <div class="pagetitle">
                    <h1>Liste Equipement</h1>
                    <nav>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Liste Equipement</li>
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
                <h1 class="card-title text-center">Formulaire de création d'équipement</h1>

                <form action="{{ route('creation-equipements') }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="equipement" name="equipement" placeholder="Equipement">
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
                            <input type="text" class="form-control" id="serialnumber" name="serialnumber" placeholder="Numéro Série">
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
                            <select class="form-select" id="equipementtype" name="equipementtype" aria-label="Equipement Type">
                                <option value="">Equipement Type</option>
                                @foreach ($equipement_type as $item)
                                    <option value="{{ $item->id  }}">{{ $item->intitule }}</option>
                                @endforeach
                            </select>
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
                            <select class="form-select" id="state_id" name="state_id" aria-label="Etat">
                                <option value="">Etat</option>
                                @foreach ($state_equipement as $item)
                                    <option value="{{ $item->id }}">{{ $item->intitule }}</option>
                                @endforeach
                            </select>
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
                            <select class="form-select" id="location_id" name="location_id" aria-label="Region">
                                <option value="">Region</option>
                                @foreach ($region_liste as $item)
                                    <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                @endforeach
                            </select>
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
                            <select class="form-select" id="site_id" name="site_id" aria-label="Equipement Type">
                                <option value="">Site</option>
                                @foreach ($site_liste as $item)
                                    <option value="{{ $item->id }}">{{ $item->site }}</option>
                                @endforeach

                            </select>
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
                            <input type="text" class="form-control" id="productnumber" name="productnumber" placeholder="Numéro Produit">
                            <label for="floatingEmail">Numéro Produit</label>
                        </div>
                        <div class="text-danger">
                            @error("productnumber")
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="available" name="available" placeholder="Password">
                            <label for="">Available </label>
                        </div>
                        <div class="text-danger">
                            @error("available")
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="feedback" name="feedback" placeholder="City">
                            <label for="floatingCity">Feedback</label>
                        </div>
                        <div class="text-danger">
                            @error('feedback')
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="col-6">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Observation" id="observation" name="observation" style="height: 100px;"></textarea>
                        <label for="floatingTextarea">Observation</label>
                        <div class="text-danger">
                            @error("observation")
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-secondary">Fermer</button>
                        <button type="submit" class="btn btn-primary">Enregistrement</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection
