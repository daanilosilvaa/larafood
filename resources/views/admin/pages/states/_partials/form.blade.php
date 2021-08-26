
@include('admin.includes.alerts')

@csrf


<div class="form-group">
    <label for="">* Nome</label>
    <input type="text" name="name" class="form-control" required placeholder="Nome:" value="{{$state->name ?? old('name')}}">
</div>
<div class="form-group">
    <label for="">* Sigla</label>
    <input type="text" name="initials" class="form-control" required placeholder="Sigla:"  value="{{$state->initials ?? old('initials')}}">
</div>
<div class="form-group">
    <label for="">Ativo?</label>
    <select name="active" class="form-control">
        <option value="1" @if(isset($state)&& $state->active == '1')selected @endif>SIM</option>
        <option value="0" @if(isset($state)&& $state->active == '0')selected @endif>Não</option>
    </select>
</div>




<div class="form-group" >
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
