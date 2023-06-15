<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('INICIO') }}
        </h2>
    </x-slot>

    <div class="cotainer-fluid">
        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        ACRHIVOS
                        <form action="{{ route('archivos-admin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <label for="tipo">Selecionar tipo</label>
                            <select class="form-select" aria-label="Default select example" name="tipo_id">
                             
                                @foreach ($tipos as $ts)
                                    <option value="{{ $ts->id }}">{{ $ts->nombre }}</option>
                                @endforeach
                             
                              </select>
                            
                              <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" name="archivo" type="file" id="formFile" required>
                              </div>
                              <button class="btn btn-primary text-primary" type="submit">Guardar</button>

                        </form>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">DIRECCION</th>
                                        <th scope="col">VER</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($archivos as $ar)
                                    <tr class="">
                                        <td scope="row">{{ $ar->id }}</td>
                                        <td>{{ $ar->direccion }}</td>
                                        <td>
                                            <a href="{{ Storage::url($ar->direccion) }}">ver</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="card-footer text-muted">
                        Footer
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        TIPOS DE NOTICIAS
                        <form action="{{ route('tipos.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">nombre</label>
                                <input type="text" name="nombre" class="form-control" id="exampleFormControlInput1" placeholder="INgrese tipo">
                              </div>
                              <button class="btn btn-primary text-primary" type="submit">Guardar</button>
                        </form>
                    </div>
                    <div class="card-body">
                       <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipos as $t)
                                    <tr class="">
                                        <td scope="row">{{ $t->id }}</td>
                                        <td>{{ $t->nombre }}</td>
                                        <td>
                                            <form action="{{ route('tipos.destroy',$t) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger text-danger" type="submit">X</button>
                                            </form>
                                        </td>
                                    </tr>    
                                @endforeach
                                
                            </tbody>
                        </table>
                       </div>
                       
                    </div>
                    <div class="card-footer text-muted">
                        Footer
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        NOTICIAS
                        <form action="{{ route('noticias-admin.store') }}" method="POST">
                            @csrf
                            
                            <label for="tipo">Selecionar tipo</label>
                            <select class="form-select" aria-label="Default select example" name="tipo_id">
                             
                                @foreach ($tipos as $ts)
                                    <option value="{{ $ts->id }}">{{ $ts->nombre }}</option>
                                @endforeach
                             
                              </select>

                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Titulo</label>
                                <input type="text" name="titulo" class="form-control" id="exampleFormControlInput1" placeholder="" required>
                              </div>
                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Detalle</label>
                                <textarea class="form-control" name="detalle" id="exampleFormControlTextarea1" rows="3" required></textarea>
                              </div>
                              <button class="btn btn-primary text-primary" type="submit">Guardar</button>

                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">TITULO</th>
                                        <th scope="col">TIPO</th>
                                        <th scope="col">DETALLE</th>
                                        <th scope="col">ACCION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($noticias as $t)
                                        <tr class="">
                                            <td scope="row">{{ $t->titulo }}</td>
                                            <td scope="row">{{ $t->tipo->nombre }}</td>
                                            <td>{{ $t->detalle }}</td>
                                            <td>
                                                <form action="{{ route('noticias-admin.destroy',$t) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger text-danger" type="submit">X</button>
                                                </form>
                                            </td>
                                        </tr>    
                                    @endforeach
                                    
                                </tbody>
                            </table>
                           </div>
                    </div>
                    <div class="card-footer text-muted">
                        Footer
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
