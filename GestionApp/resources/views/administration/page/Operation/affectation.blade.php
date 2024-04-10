@extends('administration.layout.aside')
@section('content')
    <div id="main" class="main">
        <div class="row">
            <div class="col-md-4">
                <div class="pagetitle">
                    <h1>Affectation Equipement</h1>
                    <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Affectation Equipement</li>
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
            <h5 class="card-title text-center">Affectation d'un équipement</h5>

                <form action="{{ route('modifier-equipements', $item->id) }}" method="POST" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-control" name="" id="" >
                                <option value=""></option>
                            </select>
                            <label for="floatingSelect">Affectation</label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select class="form-control" name="" id="">
                                <option value=""></option>
                            </select>
                            <label for="floatingSelect">Agent Affecté</label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="equipement" name="equipement" value="{{ $item->equipement }}">
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
                            <input type="text" class="form-control" id="serialnumber" name="serialnumber" value="{{ $item->serialnumber }}">
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
                            <select class="form-select" id="equipementtype" name="equipementtype" aria-label="Equipement Type" disabled readonly>
                                <option value="{{ $item->id  }}">{{ $item->Equipement->intitule }}</option>
                                @foreach ($equipement_type as $itemequipement)
                                    <option value="{{ $itemequipement->id  }}">{{ $itemequipement->intitule }}</option>
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
                            <select class="form-select" id="state_id" name="state_id" aria-label="Etat" disabled readonly>
                                @if ($item->State)
                                    <option value="{{ $item->State->id }}">{{ $item->State->intitule }}</option>
                                @endif
                                @foreach ($state_equipement as $state)
                                    <option value="{{ $state->id }}">{{ $state->intitule }}</option>
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
                                @if ($item->Region)
                                    <option value="{{ $item->Region->id }}">{{ $item->Region->nom }}</option>
                                @endif
                                @foreach ($region_liste as $region)
                                    <option value="{{ $region->id }}">{{ $region->nom }}</option>
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
                            <select class="form-select" id="site_id" name="site_id" aria-label="Equipement Type" readonly>
                                @if ($item->Site)
                                    <option value="{{ $item->Site->id }}">{{ $item->Site->site }}</option>
                                @endif
                                @foreach ($site_liste as $siteitem)
                                    <option value="{{ $siteitem->id }}">{{ $siteitem->site }}</option>
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
                        <div class="form-floating mt-4">
                            <input type="text" class="form-control" id="feedback" name="feedback" >
                            <label for="floatingName">Raison</label>
                        </div>
                        <div class="text-danger">
                            @error('feedback')
                                {{ $message }}
                            @enderror
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <textarea class="form-control" id="observation" name="observation" style="height: 140px;">{{ $item->observation }}</textarea>
                            <label for="floatingTextarea">Observation</label>
                            <div class="text-danger">
                                @error("observation")
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <a href="" class="btn btn-primary w-50">Affecté équipement</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection

<script>
    $(document).ready(function() {
        $('.disabled').on('mousedown', function(e) {
            e.preventDefault(); // Empêche l'ouverture de la liste déroulante
            this.blur(); // Supprime le focus de l'élément
            window.focus(); // Empêche le focus de rester sur l'élément
        });
    });
</script>


