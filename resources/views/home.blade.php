@extends('layout')
@section('title','Inicio')
@section('content')
	<br>	
	<div class="container">
		<div class="card">
		 	<div class="card-header">LISTA DE EMPLEADOS</div>
		  	<div class="card-body">			
			  	<table class='table table-hover table-striped'>
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombres</th>							
							<th>Apellidos</th>							
							<th>Identificación</th>
							<th>Teléfono</th>														
							<th>Cargos</th>
							<th>Pais</th>	
							<th>Ciudad</th>							
						</tr>
					</thead>
					<tbody>						
						@forelse($empleados as $empleadoItem)
							<tr>	
								<td>{{ $empleadoItem->id }}</td>
								<td>{{ $empleadoItem->nombres }}</td>
								<td>{{ $empleadoItem->apellidos }}</td>
								<td>{{ $empleadoItem->identificacion }}</td>
								<td>{{ $empleadoItem->telefono }}</td>								
								<td>
								@foreach($cargos as $cargoRow)
									@if($cargoRow->empleado_id == $empleadoItem->id)
										<ul class="list-group">
										  <li>{{ $cargoRow->nombre }}</li>											  
										</ul>    										
									@endif
								@endforeach								
								</td>
								<td>{{ $empleadoItem->pais }}</td>
								<td>{{ $empleadoItem->ciudad }}</td>
								<td>									
									<a href="{{ route('crear.edit', $empleadoItem->id) }}"><button class='btn btn-success btn-sm'>Editar</button></a>
								</td>
								<td>								
									<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $empleadoItem->id }}">
									  Eliminar
									</button>								
								</td>
							</tr>
						@include('partials.delete')							
						@empty
							<td>No hay registros para mostrar</td>													
						@endforelse						
					</tbody>
				</table>
		    </div>
	  	</div>
	</div>
@endsection

