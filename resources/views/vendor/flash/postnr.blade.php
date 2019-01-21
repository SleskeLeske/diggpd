@foreach (session('flash_notification', collect())->toArray() as $postnr)
    @if ($postnr['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert
                    alert-{{ $postnr['level'] }}
                    {{ $postnr['important'] ? 'alert-important' : '' }}"
                    role="alert"
        >
            @if ($postnr['important'])
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                >&times;</button>
            @endif

            {!! $postnr['message'] !!}
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
