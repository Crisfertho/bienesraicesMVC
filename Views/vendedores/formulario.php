<fieldset> 
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="vendedores[nombre]" placeholder="Nombre Vendedor(a)" value="<?php echo s($vendedor->nombre) ?>"> 

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="vendedores[apellido]" placeholder="Apellido Vendedor(a)" value="<?php echo s($vendedor->apellido) ?>"> 
    
   <label for="cedula">Cédula:</label>
    <input type="number" id="cedula" name="vendedores[cedula]" placeholder="ID Vendedor(a)" value="<?php echo s($vendedor->cedula) ?>"> 
       
</fieldset>

<fieldset>
    <legend>Información Extra </legend>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="vendedores[telefono]" placeholder="Teléfono Vendedor(a)" value="<?php echo s($vendedor->telefono) ?>">
    
    <label for="correo">Correo Electronico:</label>
    <input type="text" id="correo" name="vendedores[correo]" placeholder="Correo Vendedor(a)" value="<?php echo s($vendedor->correo) ?>">  
</fieldset>