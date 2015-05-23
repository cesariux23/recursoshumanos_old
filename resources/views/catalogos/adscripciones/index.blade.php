@include('catalogos.'.$catalogo.'.tabla', array('adscripciones'=>$datos))

{!! $datos->render() !!}
