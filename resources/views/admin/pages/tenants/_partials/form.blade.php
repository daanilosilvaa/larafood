
@include('admin.includes.alerts')


<div class="form-group">
    <label for="">Nome</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{$tenant->name ?? old('name')}}" autofocus>
</div>
<div class="form-group">
    <label for="">Logo</label>
    <input type="file" name="logo" class="form-control">
</div>
<div class="form-group">
    <label for="">E-mail</label>
    <input type="email" name="email" class="form-control" placeholder="E-mail:" value="{{$tenant->email ?? old('email')}}">
</div>
<div class="form-group">
    <label for="">CNPJ</label>
    <input type="text" name="cnpj" class="form-control" placeholder="CNPJ" value="{{$tenant->cnpj ?? old('cnpj')}}">
</div>

<div class="form-group">
    <label for="">Ativo?</label>
    <select name="ative" class="form-control">
        <option value="Y" @if(isset($tenant)&& $tenant->ative == 'Y')selected @endif>SIM</option>
        <option value="N" @if(isset($tenant)&& $tenant->ative == 'N')selected @endif>Não</option>
    </select>
</div>


@admin
<hr>
<h3>Assinatura</h3>
<div class="form-group">
    <label for="">Data Assinatura (início):</label>
    <input type="date" name="subscription" class="form-control"  value=" {{$tenant->subscription ?? old('subscription')}} ">
</div>
<div class="form-group">
    <label for="">Expira (final):</label>
    <input type="date" name="expires_at" class="form-control" value=" {{$tenant->expires_at ?? old('expires_at')}} ">
</div>
<div class="form-group">
    <label for="">Identificador :</label>
    <input type="text" name="subscription_id" class="form-control" placeholder="Identificador" value="{{$tenant->subscription_id ?? old('subscription_id')}}">
</div>
<div class="form-group">
    <label for="">Assinatura Ativa?</label>
    <select name="subscription_active" class="form-control">
        <option value="1" @if(isset($tenant)&& $tenant->subscription_active == '1')selected @endif>SIM</option>
        <option value="0" @if(isset($tenant)&& $tenant->subscription_active == '0')selected @endif>Não</option>
    </select>
</div>
<div class="form-group">
    <label for="">Assinaturan Cancelada?</label>
    <select name="subscription_suspended" class="form-control">
        <option value="1" @if(isset($tenant)&& $tenant->subscription_suspended == '1')selected @endif>SIM</option>
        <option value="0" @if(isset($tenant)&& $tenant->subscription_suspended == '0')selected @endif>Não</option>
    </select>
</div>
@endadmin

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>