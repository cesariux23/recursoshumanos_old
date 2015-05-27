<table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Clave Plaza</th>
                  <th>Plaza</th>
                  <th>Nivel</th>
                  <th>Sueldo Maximo</th>
                  <th>Vigente desde</th>
                </tr>
              </thead>

               <tbody>
                 @foreach($tabulador as $tab)
                 <tr>
                   <td>{{ $tab->clave }}</td>
                   <td>{{ $tab->descripcion }}</td>
                   <td>{{ $tab->nivel}}</td>
                   <td>{{ $tab->sueldo_max }}</td>
                   <td>{{$tab->inicio}}</td>
                 </tr>
                 @endforeach
               </tbody>

            </table>
