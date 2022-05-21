@extends('layout')
@section('title','crear')
@section('content')	

<div class="container">
<br>
<div class="card">
  	<div class="card-header">NUEVO EMPLEADO</div>
 		<div class="card-body">			
			<form class="form-horizontal" id="clienteForm" method="POST" action="{{ route('crear.store') }}">
				@csrf 
			  	<div class="form-group row">
			     	<label class="control-label col-sm-2" for="nombres">Nombres:</label>
			    	<div class="col-sm-10">          
				        <input type="text" 
				        	   name="nombres"
				        	   id="nombres" 
				        	   placeholder="Ingrese nombres" 
				        	   class="form-control" 
				        	   value="" 
				        >
				        {!! $errors->first('nombres', '<small>:message</small><br>')  !!}
			      	</div>
				</div>
				<div class="form-group row">
			     	<label class="control-label col-sm-2" for="apellidos">Apellidos:</label>
			    	<div class="col-sm-10">          
				        <input type="text" 
				        	   name="apellidos"
				        	   id="apellidos" 
				        	   placeholder="Ingrese apellidos" 
				        	   class="form-control" 
				        	   value="" 
				        >
				        {!! $errors->first('apellidos', '<small>:message</small><br>')  !!}
			      	</div>
				</div>
		    <div class="form-group row">
		      	<label class="control-label col-sm-2" for="identificacion">Identificación:</label>
		     	<div class="col-sm-10">
		        	<input type="number" 
		        		   id="identificacion"
		        		   placeholder="Ingrese identificacion"
		        		   name="identificacion"
		        		   class="form-control"
		        		   value="">
		        	{!! $errors->first('identificacion', '<small>:message</small><br>')  !!}
		      	</div>
		    </div>
		    <div class="form-group row">
		      	<label class="control-label col-sm-2" for="telefono">Teléfono:</label>
		     	<div class="col-sm-10">
		        	<input type="number" 
		        		   id="telefono"
		        		   placeholder="Ingrese teléfono"
		        		   name="telefono"
		        		   class="form-control"
		        		   value="">
		        	{!! $errors->first('telefono', '<small>:message</small><br>')  !!}
		      	</div>
		    </div>		    	    	
	    	<div class="form-group row">
		      	<label class="control-label col-sm-2" for="pais">Pais:</label>
		      	<div class="col-sm-10">          
		        	<select class="form-control" id="pais" name="pais" aria-label="Default select example">
		        		<option value="">Seleccione...</option> 	
			        	@forelse($paises as $paiseItem)		        		
			        		<option value="{{ $paiseItem->id}}">{{ $paiseItem->pais}}</option>	
			        	@empty
							<td>No hay registros para mostrar</td>
						@endforelse						
		        	</select>
		        	{!! $errors->first('pais', '<small>:message</small><br>')  !!}		
		      	</div>
	    	</div>
	    
	    	<div class="form-group row">
		      	<label class="control-label col-sm-2" for="ciudad">Ciudad:</label>
		      	<div class="col-sm-10">          
		        	<select class="form-control" id="ciudad"   name="ciudad" aria-label="Default select example">
		        		<option value="">Seleccione...</option> 	
		        		@forelse($ciudades as $ciudadItem)		    		        		
		        			<option value="{{ $ciudadItem->id}}">{{ $ciudadItem->ciudad}}</option>	
		        		@empty
							<td>No hay registros para mostrar</td>
						@endforelse								
		        	</select>
		        	{!! $errors->first('ciudad', '<small>:message</small><br>')  !!}	
		      	</div>
	    	</div>
	    
	    	<div class="form-group row">
		      	<label class="control-label col-sm-2" for="cargo">Cargo:</label>
		      	<div class="col-sm-10">          
		        	<select class="form-control" id="cargo"  name="cargo[]" aria-label="Default select example" multiple>
		        		<option value="">Seleccione...</option> 	
		        		@forelse($cargos as $cargoItem)		        		
			        		<option value="{{ $cargoItem->id}}">{{ $cargoItem->nombre}}</option>		
			        	@empty
							<td>No hay registros para mostrar</td>
						@endforelse									        		        							
		        	</select>
		        	{!! $errors->first('cargo', '<small>:message</small><br>')  !!}		
		      	</div>
	    	</div>	   
		    	<div class="form-group row">        
		      		<div class="col-sm-offset-2 col-sm-10">
		        		<button type="submit" class="btn btn-primary" id="registro">Nuevo</button>
		      		</div>
		    	</div>
		  	</form>
  		</div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
	 $(document).ready(function(){
	    
	     var multipleCancelButton = new Choices('#cargo', {
	        removeItemButton: true,
	        maxItemCount:5,
	        searchResultLimit:5,
	        renderChoiceLimit:5
	      }); 
	     
	     
	 }); 
</script>
@endsection