<select name="regionid" id="regionid" class="select2 form-control custom-select" style="width: 100%;" required="">
  <option value="">Select Region</option>
  @foreach($result as $allZone)
  <option value="{{ $allZone->id }}">{{ $allZone->name }}</option>
  @endforeach
</select>