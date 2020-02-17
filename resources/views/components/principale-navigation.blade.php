<nav id="principal">
    <ul class="ml-2 mr-4">
    	
    	<li class="px-2 py-1 {{ setActive('about', 'nav--active') }}"><a href="{!! url('/about'); !!}">À propos</a></li>
        <li class="px-2 py-1 {{ setActiveBySegments('discussions', 'nav--active') }}"><a href="{!! url('/discussions'); !!}">Discussions</a></li>
        <li class="px-2 py-1 {{ setActiveBySegments('events', 'nav--active') }}"><a class="" href="{!! url('/events'); !!}">Évènements</a></li>
        <li class="px-2 py-1 {{ setActiveBySegments('adherents', 'nav--active') }}"><a href="{!! url('/adherents'); !!}">Adhérents</a></li>
        <li class="px-2 py-1 {{ setActiveBySegments('files', 'nav--active') }}"><a href="{!! url('/files'); !!}">Fichiers</a></li>
        <li class="px-2 py-1 {{ setActiveBySegments('photos', 'nav--active') }}"><a href="{!! url('/photos'); !!}">Photos</a></li>
    </ul>  
</nav>                
