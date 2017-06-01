<table id="{{ $datatable_id }}" class="table datatable dataTable no-footer" cellspacing="0">
    <thead>
    <tr>
        @for ($i = 0; $i < count($array_columnas); $i++)
            <th>{!! $array_columnas[$i] !!}</th>
        @endfor
    </tr>
    </thead>
    <tbody>
    @foreach ($values as $value)
        <tr>
            @for ($i = 0; $i < count($array_values); $i++)
                @if($value->relationLoaded($array_values[$i])==true)
                    <td>{!! $value->getRelation($array_values[$i])->getAttribute($array_relations[$i]) !!}</td>
                @else
                    <td>{!! $value->getAttribute($array_values[$i]) !!}</td>
                @endif
            @endfor

            <td>
                @if($link)
                    <a class="glyphicon glyphicon-edit btn btn-md" href="{{url($link.'/edit/'.$value->id)}}" title="修改"></a>
                    <a class="glyphicon glyphicon-trash btn btn-md" href="{{url($link.'/destroy/'.$value->id)}}" title="删除"></a>
                @endif
                @if($array_link)
                    @for($i=0;$i<count($array_link);$i++)
                        <a class="glyphicon glyphicon-trash btn btn-md" href="{{ url($array_link[$i].'/'.$value->id) }}" title="删除"></a>
                    @endfor
                @endif
            </td>

        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        @for ($i = 0; $i < count($array_columnas); $i++)
            <th>{!! $array_columnas[$i] !!}</th>
        @endfor
    </tr>
    </tfoot>

</table>