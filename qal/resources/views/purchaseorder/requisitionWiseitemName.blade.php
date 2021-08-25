@if($type==1)

<select name="item_id" id="item_id" class="select2 form-control custom-select" style="width: 100%;" required="">
    <option value="">Select</option>
    @foreach($itemName as $rows)
    <option value="{{ $rows->item_name.'_'.$rows->id.'_'.$rows->item_id }}">{{ $rows->item_name.' | '.$rows->item_code }}</option>
    @endforeach
  </select>

@elseif($type==2)
{{ $quantity->quantity }}
<!-- <select name="unit" id="unit" class="select2 form-control custom-select" style="width: 100%;" required="">
    <option value="">Select</option>
    @foreach($unit as $rows)
    <option value="{{ $rows->id }}">{{ $rows->item_unit_id }}</option>
    @endforeach
  </select>

   -->
@endif