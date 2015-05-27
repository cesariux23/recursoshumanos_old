<table class="table table-bordered">
              <thead>
                <tr>
                  <th width="220px">Clave Horario</th>
                  <th width="220px">Hora de Entrada</th>
                  <th width="250px">Hora de Salida Comida</th>
                  <th width="250px">Hora de Entrada Comida</th>
                  <th width="220px">Hora de Salida</th>
                  <th width="220px">Tolerancia</th>
                  <th width="220px">Retardo despues de</th>
                </tr>
              </thead>
               <tbody>
                 @foreach($datos as $h)
                 <tr>
                   <td>
                     {{$h->id}}
                   </td>
                   <td>
                     {{$h->hora_entrada}}
                   </td>
                   <td>
                     {{$h->hora_salida_comida}}
                   </td>
                   <td>
                     {{$h->hora_entrada_comida}}
                   </td>
                   <td>
                     {{$h->hora_salida}}
                   </td>
                   <td>
                     <b>{{$h->tolerancia}}</b> min.
                   </td>
                   <td>
                     <b>{{$h->retardo}}</b> min.
                   </td>
                 </tr>

                 @endforeach
               </tbody>
            </table>
