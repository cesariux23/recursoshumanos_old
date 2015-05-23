<table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>
                    Clave Adscripciones
                  </th>
                  <th>
                    Nombre de la Adscripcion
                  </th>
                  <th>
                    Empleados
                  </th>
                </tr>
              </thead>
               <tbody>
                 @foreach($adscripciones as $ad)
                 <tr>
                   <td>{{ $ad->id }}</td>
                   <td>{{ $ad->adscripcion }}</td>
                   <td>
                     @if($ad->NumEmpleados>0)
                       <b>{{$ad->NumEmpleados}}</b>
                    @else
                      <span class="text-muted">0</span>
                     @endif

                   </td>
                 </tr>
                 @endforeach
               </tbody>
            </table>
