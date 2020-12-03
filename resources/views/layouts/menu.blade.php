<li class="{{ Request::is('*relatorio-1*') ? 'active' : '' }}">
    <a href="{!! route('relatorio.1')!!}" >Filmes</a>
</li>

@if(Auth::user()->hasRole('premium'))
    <li class="{{ Request::is('*relatorio-2*') ? 'active' : '' }}">
        <a href="{!! route('relatorio.2')!!}" >Pessoas</a>
    </li>
@endif
