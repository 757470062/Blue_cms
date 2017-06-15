<select name="{{ $name }}" class="form-control" id="{{ $id }}" multiple="multiple">
    @foreach($datas as $k => $v)
        @if(empty($checked))
            <option value="{{ $v->id }}">{{ $v->name }}</option>
        @else
                @for($j=0; $j < count($checked); $j++)
                    @if($v->id == $checked[$j]['tag_id'])
                        <option value="{{ $v->id }}" selected="selected" >{{ $v->name }}</option>
                        @continue
                    @else
                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                        @continue
                    @endif
                 @endfor
         @endif
    @endforeach
</select>