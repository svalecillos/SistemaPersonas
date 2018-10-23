<div class="col-lg-7">
    <h3>Personas</h3>
    <hr/>
    <a href="<?php echo $helper->url("persona","registerView"); ?>" class="btn btn-success">Agregar</a>
</div>
<div class="col-lg-12">
    <?php  if(isset($_SESSION["msjSuccessful"])){ ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_SESSION["msjSuccessful"] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }elseif(isset($_SESSION["msjError"])){?>
        <div class="alert alert-warning" role="alert">
            <?php echo $_SESSION["msjError"] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php }?>
</div>
                
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">TELEFONO</th>
            <th scope="col">FECHA</th>
            <th scope="col">ACCION</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($allpersona as $persona) { //recorremos el array de objetos y obtenemos el valor de las propiedades ?>
            <tr>
                <td><?php echo $id++; ?></td>
                <td><?php echo $persona->nombre; ?> </td>
                <td><?php echo $persona->email; ?> </td>
                <td><?php echo $persona->telefono; ?></td>
                <td><?php echo $persona->fecha; ?></td>
                <td>
                    <a href="<?php echo $helper->url("persona","delete"); ?>&id=<?php echo $persona->id; ?>" class="btn btn-danger">Borrar</a>
                    <a href="<?php echo $helper->url("persona","updateView"); ?>&id=<?php echo $persona->id; ?>" class="btn btn-primary">Modificar</a>
                </td>
            <tr>
        <?php } ?>
    </tbody>
</table>