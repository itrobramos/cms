@extends('layouts.app')



@section('content')

<div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Clientes</h3>
              <br>
              <div class="col-1 text-right">
                  <a href="{{ url('clients/create')}}" class="btn btn-sm btn-primary">Nuevo cliente</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Último Servicio</th>
                    <th scope="col">Mascotas</th>
                    <th scope="col">Ingresos</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($clients as $client)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <a href="#" class="avatar rounded-circle mr-3">
                          <img alt="Image placeholder" src="{{$client->avatar}}">
                        </a>
                        <div class="media-body">
                          <span class="mb-0 text-sm">{{$client->first_name}}  {{$client->last_name}}</span>
                        </div>
                      </div>
                    </th>
                    <td>
                    {{$client->email}}
                    </td>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <i class="bg-warning"></i>Pendiente Hace 5 meses
                      </span>
                    </td>
                    <td>Pendiente
                      <div class="avatar-group">
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Alexander Smith">
                          <img alt="Image placeholder" src="dashboard/assets/img/theme/team-3-800x800.jpg" class="rounded-circle">
                        </a>
                        <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="Jessica Doe">
                          <img alt="Image placeholder" src="dashboard/assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                        </a>
                      </div>
                    </td>
                    <td>
                    Pendiente $ 100.00
                    </td>
                    <td>
                      <a href="./clients/{{$client->id}}/edit"><button class="btn btn-icon btn-2 btn-primary btn-sm" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                      </button></a>
                      <button class="btn btn-icon btn-2 btn-danger btn-sm" type="button">
                        <span class="btn-inner--icon"><i class="fas fa-trash-alt"></i></span>
                      </button>
                    </td>               

                  </tr>
                  @endforeach
                  
                  
                  
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>

@endsection