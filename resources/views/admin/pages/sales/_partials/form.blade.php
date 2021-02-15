
@include('admin.includes.alerts')


<div class="form-group">
    <label for="">* Identificação</label>
    <input type="text" name="identify" class="form-control" placeholder="Identificação:" value="{{$sale->identify ?? old('identify')}}" autofocus>
</div>

<div class="form-group">
    <label for="">* Total</label>
    <input type="text" name="total" class="form-control" placeholder="Total :" value="{{$sale->total ?? '0,00'}}" disabled>
</div>


<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>