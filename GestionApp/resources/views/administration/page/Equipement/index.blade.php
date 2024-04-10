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
            <a href="{{ route('create-equipement') }}" class="btn btn-primary w-100"  >Ajouter Equipement</a>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">Liste des équipements </h5>

          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Equipement</th>
                <th scope="col">Numéro Série</th>
                <th scope="col">ID Produit</th>
                <th scope="col">Equipemnt Type</th>
                <th scope="col">Region</th>
                <th scope="col">Site</th>
                <th scope="col">Etat</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ( $liste_equipements as $item)
                <tr>
                    <td class="cell">{{ ($liste_equipements->perPage() * ($liste_equipements->currentPage() - 1 ))+ $loop->iteration }}</td>
                    <td class="cell">{{ $item->equipement }}</td>
                    <td class="cell">{{ $item->serialnumber }}</td>
                    <td class="cell">{{ $item->productnumber }}</td>
                    <td class="cell">{{ $item->Equipement->intitule }}</td>
                    <td class="cell">{{ $item->Region->nom }}</td>
                    <td class="cell">{{ $item->Site->site }}</td>
                    <td class="cell">{{ $item->State->intitule }}</td>
                    <td>
                        <a href="{{ route('affectation-equipement', $item->id) }}" class="text-black"><i class="bi bi-person-bounding-box"></i></a>&nbsp;
                        <a href="{{ route('details-equipement', $item->id) }}" class="text-black" ><i class="bi bi-eye"></i></a>&nbsp;
                        <a href="{{ route('afficher-modification', $item->id) }}" class="text-black" ><i class="bi bi-pencil"></i></a>&nbsp;
                        <a href="" class="text-black"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="cell" colspan="12">
                        <div class="" style="text-align: center">Aucun équipement enregistré</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
    </div>

    <!-- Les modals -->

    <div class="card">
          <!-- Modal VisionnerEquipement -->
          <div class="modal fade" id="VisionnerEquipement" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Basic Modal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('modifier-equipements', $item->id) }}" method="POST" class="row g-3">
                        @csrf
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
                                <select class="form-select" id="equipementtype" name="equipementtype" aria-label="Equipement Type">
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
                                <select class="form-select" id="state_id" name="state_id" aria-label="Etat">
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
                                <select class="form-select" id="site_id" name="site_id" aria-label="Equipement Type">
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
                                <input type="text" class="form-control" id="productnumber" name="productnumber" value="{{ $item->productnumber }}">
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
                                <input type="text" class="form-control" id="available" name="available" value="{{ $item->available }}">
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
                                <input type="text" class="form-control" id="feedback" name="feedback" value="{{ $item->feedback }}">
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
                                <textarea class="form-control" id="observation" name="observation" style="height: 100px;">{{ $item->observation }}</textarea>
                                <label for="floatingTextarea">Observation</label>
                                <div class="text-danger">
                                    @error("observation")
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center">
                            <a href="" class="btn btn-primary w-50">Modifier</a>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    @if(Session::has('message'))
        <script>
            swal("message", "{{ Session::get('message') }}", 'success', {
                showConfirmButton: false,
                title: 'Bon travail !',
                timer: 15000
            });
        </script>
    @endif

</div>
@endsection
