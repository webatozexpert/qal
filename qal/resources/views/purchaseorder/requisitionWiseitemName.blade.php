@if($type==1)

<select name="item_id" id="item_id" class="select2 form-control custom-select" style="width: 100%;" required="">
    <option value="">Select</option>
    @foreach($itemName as $rows)
    <option value="{{ $rows->item_name.'_'.$rows->id.'_'.$rows->item_id }}">{{ $rows->item_name.' | '.$rows->item_code }}</option>
    @endforeach
</select>

@elseif($type==2)
{{ $quantity->quantity }}

@elseif($type==3)

<select name="branch" id="branch" class="select2 form-control custom-select" style="width: 100%;" onchange="requisitionWiseBranch(this.value)">
    @foreach($branch as $rows)
    <option value="{{ $rows->name.'_'.$rows->id }}" @if($rows->id==$branchReq->branch_id) selected="" @endif>
        {{ $rows->name }}
    </option>
    @endforeach
</select>

@endif