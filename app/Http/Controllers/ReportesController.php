<?php

class ReportesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /reportes
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('reportes.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /reportes/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reportes
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /reportes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /reportes/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /reportes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /reportes/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function generaSolicitudBanco($rfc)
	{
		$pdf=new PDF();
		$empleado=Empleado::find($rfc);
		$municipio=Municipios::find($empleado->datos->municipio);

		            //Crear objeto y recibir la opción del combo box
            //$baseDatos = new myDBC();
            //$RFCEmpleado = $_POST['rfc'];

            //Se obtiene un arreglo con la información del empleado
            //$info_empleado = $baseDatos->obtenerEmpleado($RFCEmpleado);

            //Creamos los arrays para preg_replace
            $patrones = array();
            $sustituciones = array();

            //Obtenemos el texto para buscar y reemplazar dentro de éste
            //$cadena = file_get_contents('reportebanco.txt');
            $cadena = File::get('reportebanco.txt');

            //Patrones a buscar
            $patrones[0] = '/#1/';
            $patrones[1] = '/#2/';
            $patrones[2] = '/#3/';
            $patrones[3] = '/#4/';
            
 			
 			$sustituciones[0]=$empleado->paterno;
 			$sustituciones[1]=$empleado->materno;
 			$sustituciones[2]=$empleado->nombre;
 			$sustituciones[3]=strtoupper($municipio->municipio);
            //Con estas líneas se cambian los índices. Necesario como
            //$dm = 7;
            //foreach($info_empleado as $valor)
            //{
              //  $sustituciones[$dm] = $valor;
                //$dm--;
            //}
 
            //Se hacen las sustituciones a la cadena
            $cadenaCambiada = preg_replace($patrones, $sustituciones, $cadena);
            $cadMod = utf8_decode($cadenaCambiada);
 
            $pdf = new PDF('P','mm','Letter');//Crea objeto PDF
            $pdf->AddPage(); //Vertical, Carta
            $pdf->SetFont('Arial','',12); //Arial, negrita, 12 puntos
            $pdf->AliasNbPages();

            /////////////////////////////////////////////////////

    //Arreglo de Meses
	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    //Fuente del ASUNTO
	$pdf->SetFont('Arial','',10);

    //Imprimir ASUNTO
	$pdf->Cell(0,22,utf8_decode('ASUNTO: Solicitud de tarjeta de Nómina Electrónica'),0,1,'R');$pdf->Ln(-18.5);

    //Leemos la fecha y guardamos la cadena.
	$fecha="Xalapa, Ver., a ".date("d") ." de ".$meses[date("n")-1] ." de " .date("Y");
	$pdf->Cell(0,22,$fecha,0,1,'R');

    //Imprimir GRUPO FINANCIERO HSBC
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(40,7,'GRUPO FINANCIERO HSBC, S.A',0, 1 , ' L '); $pdf->Ln(-3);

            ///////////////////////////////////////////////////////
 
            //$pdf->Ln();
            //$pdf->ImprimirTexto('textoFijo.txt'); //imprime un texto fijo
            //$pdf->Ln();
            //$pdf->ImprimirTexto('machote.txt'); //Imprime el texto original
            $pdf->Ln(-24);
            $pdf->MultiCell(0, 5,  $cadMod ); //Imprime el texto cambiado

            /////////////////////////////////////////////////////


	$col3=utf8_decode("A T E N T A M E N T E"); $pdf->Ln(-110);
	$pdf->MultiCell(195,5, $col3, 0, 'C');

	$col4=utf8_decode("LIC. KARINA CORTES FLORES \n JEFE DEL DEPARTAMENTO DE RECURSOS HUMANOS"); $pdf->Ln(30);
	$pdf->MultiCell(195,5, $col4, 0, 'C'); $pdf->Ln(10);

            /////////////////////////////////////////////////////
 
            $pdf->Output();               //Salida al navegador
	}

}