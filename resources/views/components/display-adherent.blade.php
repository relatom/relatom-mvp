@if($adherent->is_children === 1)
    {{ $adherent->child->firstname}}
@else
    {{ $adherent->user->firstname}} 
@endif

 {{ $adherent->user->lastname}}