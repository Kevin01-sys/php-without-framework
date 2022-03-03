<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	 <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
    <!--<link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">-->
    <title>DataTables example</title>
</head>
<body>
<h1>Behold... the power of DataTables!</h1>
<table id="theTable" class="table table-bordered table-hover" cellspacing="0" style="width: 100%">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>price</td>
            <td>Eliminar</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
            <th>Eliminar</th>
        </tr>
    </tfoot>
</table>
</body>
</html>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="application/javascript">
    $(document).ready( function () {
        $('#theTable').DataTable({
            ajax: 'get_data.php',
        });
    } );
</script>