@include('Chatify::layouts.headLinks')
<div class="messenger">
    {{-- ----------------------Liste des utilisateurs/groupes---------------------- --}}

 

    <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
        {{-- En-tête et barre de recherche --}}
        <div class="m-header">
            <nav>
                <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                {{-- Boutons d'en-tête --}}
                <nav class="m-header-right">
                    <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                    <a id="list" href="#"><i class="fas fa-list list-btn"></i></a>
                    <a id="close" style="display:none;" href="#"><i class="fas fa-times close-btn"></i></a>
                    <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                </nav>
            </nav>
            {{-- Champ de recherche --}}
            <input type="text" class="messenger-search" id="recherche" placeholder="Recherche" />
            <input type="text" class="messenger-search" style="display:none;" id="recherchep" placeholder="Recherche..." />
            {{-- Onglets --}}
            {{-- <div class="messenger-listView-tabs">
                <a href="#" class="active-tab" data-view="users">
                    <span class="far fa-user"></span> Contacts</a>
            </div> --}} 
        </div>
        {{-- onglets et listes --}}
        <div class="m-body contacts-container" id="listselect" >
           {{-- Listes [Utilisateurs/Groupe] --}}
           {{-- ---------------- [ Onglet Utilisateur ] ---------------- --}}
           <div class="show messenger-tab users-tab app-scroll" data-view="users">
               {{-- Favoris --}}
               <div class="favorites-section">
                <p class="messenger-title"><span>Favoris</span></p>
                <div class="messenger-favorites app-scroll-hidden"></div>
               </div>
               {{-- Messages enregistrés --}}
               <p class="messenger-title"><span>Votre espace</span></p>
               {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
               {{-- Contact --}}
               <p class="messenger-title"><span>Tous les messages</span></p>
               <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;">
                  
               </div>
           </div>
             {{-- ---------------- [ Onglet Recherche ] ---------------- --}}
           <div class="messenger-tab search-tab app-scroll" data-view="search">
                {{-- éléments --}}
                <p class="messenger-title"><span>Recherche</span></p>
                <div class="search-records">
                    <p class="message-hint center-el"><span>Tapez pour rechercher..</span></p>
                </div>
             </div>
        </div>

        <!-- alllist -->

         <div class="m-body contacts-container" id="alllist" style="display:none;">
         
           {{-- ---------------- [ Onglet Utilisateur ] ---------------- --}}
           <div class="show messenger-tab users-tab app-scroll" data-view="users">
               {{-- Messages enregistrés --}}
               <p class="messenger-title"><span>LISTE DE PROF</span></p>

               @foreach ($contacts as $contact)
                <table class="messenger-list-item" data-contact="{{ $contact->id }}">
                    <tr data-action="0">
                        {{-- Côté avatar --}}
                        <td style="position: relative">
                            @if($contact->active_status)
                                <span class="activeStatus"></span>
                            @endif
                            <div class="avatar av-m"
                                 style="background-image: url('{{ $contact->avatar }}');">
                            </div>
                        </td>
                        {{-- Côté centre --}}
                        <td>
                            <p data-id="{{ $contact->id }}" data-type="user">{{ strlen($contact->name) > 22 ? trim(substr($contact->name,0,22)).'..' : $contact->name }}</p>
                            <span class="" >{{ $contact->classroom->name }}</span></p>
                        </td>
                    </tr>
                </table>
                @endforeach

           </div>

        </div>
        <!-- alllist -->

    </div>



    {{-- ----------------------Zone de messagerie---------------------- --}}
    <div class="messenger-messagingView">
        {{-- titre d'en-tête [nom de la conversation] et boutons --}}
        <div class="m-header m-header-messaging">
            <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                {{-- bouton de retour en arrière, avatar et nom d'utilisateur --}}
                <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                    <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                    <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                    </div>
                    <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                </div>
                {{-- Boutons d'en-tête --}}
                <nav class="m-header-right">
                    <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                    <a href="/"><i class="fas fa-home"></i></a>
                    <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                </nav>
            </nav>
            {{-- Connexion Internet --}}
            <div class="internet-connection">
                <span class="ic-connected">Connecté</span>
                <span class="ic-connecting">Connexion en cours...</span>
                <span class="ic-noInternet">Pas d'accès Internet</span>
            </div>
        </div>

        {{-- Zone de messagerie --}}
        <div class="m-body messages-container app-scroll">
            <div class="messages">
                <p class="message-hint center-el"><span>Veuillez sélectionner un chat pour commencer à envoyer des messages</span></p>
            </div>
            {{-- Indicateur de saisie --}}
            <div class="typing-indicator">
                <div class="message-card typing">
                    <div class="message">
                        <span class="typing-dots">
                            <span class="dot dot-1"></span>
                            <span class="dot dot-2"></span>
                            <span class="dot dot-3"></span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
        {{-- Formulaire d'envoi de message --}}
        @include('Chatify::layouts.sendForm')
    </div>
    {{-- ---------------------- Zone d'informations ---------------------- --}}
    <div class="messenger-infoView app-scroll">
        {{-- actions de navigation --}}
        <nav>
            <p>Détails de l'utilisateur</p>
            <a href="#"><i class="fas fa-times"></i></a>
        </nav>
        {!! view('Chatify::layouts.info')->render() !!}
    </div>
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
