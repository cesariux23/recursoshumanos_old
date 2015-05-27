<table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Clave Plaza</th>
                  <th>Plaza</th>
                  <th>Zona económica</th>
                  <th>Nivel</th>
                  <th>Sueldo Mensual</th>
                  <th>Compensación garantizada</th>
                  <th>Vigente desde</th>
                </tr>
              </thead>

               <tbody>
                 @foreach($tabulador as $tab)
                 <tr>
                   <td>{{ $tab->clave }}</td>
                   <td>{{ $tab->descripcion }}</td>
                   <td>{{ $tab->zona_eco }}</td>
                   <td>{{ $tab->nivel}}</td>
                   <td>{{ $tab->sueldo_bruto }}</td>
                   <td>{{ $tab->compensacion }}</td>
                   <td>{{$tab->inicio}}</td>
                 </tr>
                 @endforeach
               </tbody>

            </table>
