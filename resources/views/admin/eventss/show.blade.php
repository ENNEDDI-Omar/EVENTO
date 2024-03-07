@extends('layouts.app')

@section('content')
    <!-- Affichez les détails de l'événement ici -->

    <form action="{{ route('admin.events.updateStatus', $event->id) }}" method="post">
        @csrf
        @method('patch') <!-- Utilisez la méthode PATCH pour la mise à jour -->
        
        <button type="submit" name="status" value="accepted">Accepter</button>
        <button type="submit" name="status" value="refused">Refuser</button>
    </form>
@endsection
