@if($type==1)

<select name="item_name" id="item_name" class="select2 form-control custom-select" style="width: 100%;" required="">
    <option value="">Select</option>
    @foreach($itemName as $rows)
    <option value="{{ $rows->id }}">{{ $rows->item_name }}</option>
    @endforeach
  </select>

@elseif($type==2)
{{ $unit->item_unit_id }}
<!-- <select name="unit" id="unit" class="select2 form-control custom-select" style="width: 100%;" required="">
    <option value="">Select</option>
    @foreach($unit as $rows)
    <option value="{{ $rows->id }}">{{ $rows->item_unit_id }}</option>
    @endforeach
  </select>

   -->
@endif