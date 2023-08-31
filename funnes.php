<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
    function resetform() {
     //$("form select").each(function() { this.selectedIndex = 0 });
     $("form input[type=text] , form textarea").each(function() { this.value = '' });
}
</script>

<form>

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" value="Alberto">

    <label for="opciones">Opciones</label>
    <select name="opciones">
        <option value="">Selccionar opciones</option>
        <option value="1" selected>Opción 1</option>
    </select>

    <label for="mensaje">Opciones</label>
    <textarea name="mensaje">Lorem ipsum dolor sit.</textarea>

    <input type="submit" value="Enviar">

    <input type="button" onclick="resetform()" value="Reiniciar">

</form>