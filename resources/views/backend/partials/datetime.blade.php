@if(isset($schedule) && $schedule === 'later')
<div class="form-group col-md-12">
    <input class="form-control" type="text" name="send_date" id="demo" placeholder="Select Date & Time"/>
</div>
@error('send_date')
    <small id="dateHelp" class="form-text text-danger">{{ $message }}</small>
@enderror
@endif