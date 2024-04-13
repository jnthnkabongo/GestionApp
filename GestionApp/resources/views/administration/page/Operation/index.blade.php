@extends('administration.layout.aside')
@section('content')
    <div id="main" class="main">
        <div class="row">
            <div class="col-md-4">
                <div class="pagetitle">
                    <h1>Liste Affectation</h1>
                    <nav>
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Liste Affectation</li>
                      </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <button class="btn btn-primary w-100">Enregistrer</button>
            </div>
        </div>


        <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Liste d'Affectation</h5>

              <!-- Table with stripped rows -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom Agent</th>
                    <th scope="col">Equipement</th>
                    <th scope="col">Identifiant Equipement</th>
                    <th scope="col">Opération</th>
                    <th scope="col">Region</th>
                    <th scope="col">Site</th>
                    <th scope="col">Raison</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($liste_affecattion as $affectation)
                        <tr>
                            <td class="cell"></td>
                            <td class="cell">{{ $affectation->Staff->names }}</td>
                            <td class="cell">{{ $affectation->EquipementAffect->equipement }}</td>
                            <td class="cell">{{ $affectation->EquipementAffect->id }}</td>
                            <td class="cell">{{ $affectation->Operation->intitule }}</td>
                            <td class="cell">{{ $affectation->Region->nom }}</td>
                            <td class="cell">{{ $affectation->Site->site }}</td>
                            <td class="cell">{{ $affectation->reason }}</td>
                            <td>
                                <a href="" class="text-black"><i class="bi bi-person-bounding-box"></i></a>&nbsp;
                                <a href="" class="text-black" ><i class="bi bi-eye"></i></a>&nbsp;
                                <a href="" class="text-black" ><i class="bi bi-pencil"></i></a>&nbsp;
                                <a href="" class="text-black"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td class="cell" colspan="12">
                            <div class="" style="text-align: center">Aucun équipement affecté</div>
                        </td>
                    </tr>
                    @endforelse


                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
        </div>

    </div>
@endsection
