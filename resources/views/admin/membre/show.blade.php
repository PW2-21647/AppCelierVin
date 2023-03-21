@extends('layouts.admin')
@section('title', 'Admin')
@section('content')

<!-- CHANGEZ LA GESTION DES MESSAGES D'ERREURS -->
<!-- CHANGEZ LA GESTION DES MESSAGES D'ERREURS -->
<!-- CHANGEZ LA GESTION DES MESSAGES D'ERREURS -->
<!-- CHANGEZ LA GESTION DES MESSAGES D'ERREURS -->
<!-- CHANGEZ LA GESTION DES MESSAGES D'ERREURS -->
<div>
    @if($errors)
      <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{ $error }}</li>
        @endforeach
      </ul>
    @endif
</div>
<!-- CHANGEZ LA GESTION DES MESSAGES D'ERREURS -->
<!-- CHANGEZ LA GESTION DES MESSAGES D'ERREURS -->
<!-- CHANGEZ LA GESTION DES MESSAGES D'ERREURS -->
<!-- CHANGEZ LA GESTION DES MESSAGES D'ERREURS -->
<!-- CHANGEZ LA GESTION DES MESSAGES D'ERREURS -->

    <form action="" method="post" class="formBtl_form">
        @csrf
        @method('put')

        <label for="nom">Nom</label>
        <input id="nom" name="name" type="text" value="{{$utilisateur->name}}">

        <label for="courriel">Courriel</label>
        <input id="courriel" name="email" type="text" value="{{$utilisateur->email}}">

        <label for="permission">Niveau d'accès</label>
        <select id="permission" name="permission_id" >
            @forelse($permissions as $permission)
                <option value="{{$permission->id}}" 
                    @if($permission->id == $utilisateur->permission_id)
                    selected
                    @endif>
                    {{$permission->permission}}</option>
            @empty
            @endforelse
        </select>

        <input class="btn" type="submit" value="Mettre à jour">
        
    </form>

@endsection