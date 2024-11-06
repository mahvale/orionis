{{-- Informations utilisateur et avatar --}}
<div class="avatar av-l chatify-d-flex">
    @php
        $user = Auth::user();
    @endphp
    <img src="{{ $user->avatar ? asset('storage/users-avatar/' . $user->avatar) : asset('storage/users-avatar/avatar.png') }}" 
     alt="Avatar de {{ $user->avatar }}" class="avatar-user">

</div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Supprimer la conversation</a>
</div>
{{-- Photos partagées --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Photos partagées</span></p>
    <div class="shared-photos-list"></div>
</div>
  