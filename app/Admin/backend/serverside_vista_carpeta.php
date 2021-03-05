<?php

    include("../../../global/conexion.php");

    $request = $_REQUEST;
    $col = array(
        0   =>  'ca_numero_item',
        1   =>  'ca_nombre_carpeta',
        2   =>  'ca_fecha_final',
        3   =>  'ca_numero_folios',
        
    );  //create column like table in database

    $sql = "SELECT * FROM vista_carpeta";
    $query = mysqli_query($con, $sql);

    $totalData = mysqli_num_rows($query);

    $totalFilter = $totalData;

    //Search
    $sql = "SELECT * FROM vista_carpeta WHERE 1=1";
    if (!empty($request['search']['value'])) {
        $sql .= " AND (ca_numero_item Like '" . $request['search']['value'] . "%' ";
        $sql .= " OR ca_nombre_carpeta Like '" . $request['search']['value'] . "%' ";
        $sql .= " OR ca_fecha_final Like '" . $request['search']['value'] . "%' ";
        $sql .= " OR ca_numero_folios Like '" . $request['search']['value'] . "%' )";
    }
    $query = mysqli_query($con, $sql);
    $totalData = mysqli_num_rows($query);

    //Order
    $sql .= " ORDER BY " . $col[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'] . "  LIMIT " .
    $request['start'] . "  ," . $request['length'] . "  ";

    $query = mysqli_query($con, $sql);

    $data = array();

    while ($row = mysqli_fetch_array($query)) {
    $subdata = array();
    $subdata[] = $row[0]; //id
    $subdata[] = $row[1]; //name
    $subdata[] = $row[2]; //salary
    $subdata[] = $row[3]; //age
        //create event on click in button edit in cell datatable for display modal dialog           $row[0] is id in table on database
        $subdata[] = "";
        $data[] = $subdata;
    }

    $json_data = array(
        "draw"              =>  intval($request['draw']),
        "recordsTotal"      =>  intval($totalData),
        "recordsFiltered"   =>  intval($totalFilter),
        "data"              =>  $data
    );

    echo json_encode($json_data);

?>
