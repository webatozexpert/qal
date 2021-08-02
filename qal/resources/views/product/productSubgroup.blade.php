@if($type==1)

  <select name="subgroup_id" id="subgroup_id" class="select2 form-control custom-select" style="width: 100%;" required="">
    <option value="">Select</option>
    @foreach($subgroup as $rows)
    <option value="{{ $rows->id }}">{{ $rows->name }}</option>
    @endforeach
  </select>

@elseif($type==2)

  <select name="category" id="category" class="select2 form-control custom-select" style="width: 100%;" required="">
    {{-- <option value="">Select</option> --}}
    @foreach($category as $rows)
    <option value="{{ $rows->id }}">{{ $rows->name }}</option>
    @endforeach
  </select>
  
@endif