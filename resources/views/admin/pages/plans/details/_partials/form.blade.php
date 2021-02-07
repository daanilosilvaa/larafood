
@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="">Nome</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $detail->name ?? old('name')}}" autofocus>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>