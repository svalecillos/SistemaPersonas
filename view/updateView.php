<?php foreach ($datosPersona as $persona) {?>
    <div class="col-sm-8 col-sm-offset-2">
        <form action="<?php echo $helper->url("persona", "update"); ?>"  method="post" id="formDatosPersona" class="form-horizontal">
            <h3>Añadir Persona</h3>
            <hr/>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="nombre">Nombre:</label>
                <div class="col-sm-5">
                    <input type="text" name="nombre" id="nombre" value="<?php echo $persona->nombre ?>" class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="email">Correo:</label> 
                <div class="col-sm-5">
                    <input type="email" name="email" id="email" value="<?php echo $persona->email ?>" class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="telefono">Telefono:</label>
                <div class="col-sm-5">
                    <input type="text" name="telefono" id="telefono" value="<?php echo $persona->telefono ?>" class="form-control" required/>
                </div> 
            </div>
            <input type="hidden" name="idPersona" value="<?php echo $persona->id ?>"><!--Campo oculto para tener el id del inmueble y enviarlo por post al controlador-->
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-4">
                    <input type="submit" value="enviar" class="btn btn-success"/>
                </div>
            </div>
        </form> 
    </div>
<?php }?>
