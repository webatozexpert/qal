<select name="customerid" id="customerid" class="select2 form-control custom-select" style="width: 100%;" required="" onchange="agentInfo(this.value)">
    <option value="">Select Agent</option>
    @foreach($result as $allZone)
    <option value="{{ $allZone->id }}">{{ $allZone->name }} ({{ $allZone->code }})</option>
    @endforeach
</select>