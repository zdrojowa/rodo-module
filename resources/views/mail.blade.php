<div>
    Imię i nazwisko: {{ $name }}
</div>
<div>
    Numer telefonu: {{ $phone ?? 'brak' }}
</div>
@if($hours === 'before' || $hours === 'after')
    <div>
        Telefon w godzinach: @if($hours === 'before') do @else po @endif 17:00
    </div>
@endif
<div>
    Email: {{ $email ?? 'brak' }}
</div>
<div>
    Wiadomość: {{ $text ?? 'brak' }}
</div>
